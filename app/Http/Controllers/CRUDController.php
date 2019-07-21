<?php

namespace App\Http\Controllers;

use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CRUDController extends Controller
{
    public function index($class)
    {
        return view('crud.index',['class' => $class]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($class)
    {
        $LayoutName=$class::getLayout();
        $ActionUrl=$class::route('store');
        $scripts = [];
        $fields = [];
        $heads = [];
        foreach($class::getform() as $key =>$form){
            if(isset($form['addable']) && $form['addable'])
                $view =View::make('crud.widgets.addable.'.$form['type'])->with(['fiels' => $form,'value' => old($form['name']),'class' =>$class ])->renderSections();
            else
                $view =View::make('crud.widgets.'.$form['type'])->with(['fiels' => $form,'value' => old($form['name']),'class' =>$class ])->renderSections();
                if (isset($view['script']))
                $scripts[] = $view['script'];
            if (isset($view['field']))
                $fields[] = $view['field'];
            if (isset($view['head']))
                $heads[] = $view['head'];
        }
//        dd(compact('LayoutName','ActionUrl','heads','fields','scripts'));
        return view('crud.create',compact('LayoutName','ActionUrl','heads','fields','scripts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$class)
    {

        $this->validate($request,$class::getvalidation());
        $new = new $class;
//        dd($new);
        foreach ($new->getFillable() as $fillable)
        {
            $field = $class::findField($fillable);
            switch ($field['type']){
                case 'file':
                    if (isset($field['addable']) && $field['addable']){
                        $file_addresses=[];
                        if (isset($request->{$fillable}) && is_array($request->{$fillable}))
                            foreach ($request->file($fillable) as $key => $file)
                                {
                                    $name = time() . '.'.$file->getClientOriginalName();
                                    $file->move(public_path('files'), $name);
                                    $file_addresses[]='files/'.$name;
                                }

                        $new->{$fillable} = $file_addresses;
                    }
                    else{
                        if($request->hasFile($fillable)){
                            $name = time() . '.'.$request->{$fillable}->getClientOriginalName();
                            $request->file($fillable)->move(public_path('files'), $name);
                            $new->{$fillable} ='files/'.$name;
                        }


                    }
                    break;
                case 'checkbox':
                    $new->{$fillable} = $request->{$fillable}??0;
                    break;
                default :
                    if (isset($request->{$fillable}))
                        $new->{$fillable} = $request->{$fillable};

            }

            if (isset($field['importable']) && $class::is_new($field,$request->{$fillable})){
                $new->{$fillable} = $class::{$field['importable']}($request->{$fillable});
            }


        }

        $new->save();
        $this->handlePivots($new,$request,$class);

        return redirect($class::route('index'))->with('message','با موفقیت ذخیره شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show($id,$class)
    {
        $content = $class::FindOrFail($id);
        return view('event.single',compact('content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$class)
    {
        $record = $class::findOrFail($id);
        $LayoutName=$class::getLayout();
        $ActionUrl=$class::route('edit');
        $methodField = method_field('put');
        $scripts = [];
        $fields = [];
        $heads = [];
        foreach($class::getform() as $key =>$form){
            if(isset($form['addable']) && $form['addable'])
                $view =View::make('crud.widgets.addable.'.$form['type'])->with(['fiels' => $form,'value' => $record->{$form['name']},'class' =>$class ])->renderSections();
            else
                $view =View::make('crud.widgets.'.$form['type'])->with(['fiels' => $form,'value' => $record->{$form['name']},'class' =>$class ])->renderSections();
            if (isset($view['script']))
                $scripts[] = $view['script'];
            if (isset($view['field']))
                $fields[] = $view['field'];
            if (isset($view['head']))
                $heads[] = $view['head'];
        }
//        dd(compact('LayoutName','ActionUrl','heads','fields','scripts'));
        return view('crud.create',compact('LayoutName','ActionUrl','heads','fields','scripts','methodField'));
        return view('crud.edit',['class' => $class,'record'=>$record]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,$class)
    {
        $record = $class::findOrFail($id);
        $this->validate($request,$class::getvalidation());
        foreach ($record->getFillable() as $fillable)
        {
            $field = $class::findField($fillable);
            switch ($field['type']){
                case 'file':
//                    dd('hello');
                    if (isset($field['addable']) && $field['addable']){
                        $file_addresses=[];
                        if (isset($request->{$fillable}) && is_array($request->{$fillable}))
                            foreach ($request->file($fillable) as $key => $file)
                            {
                                $name = time() . '.'.$file->getClientOriginalName();
                                $file->move(public_path('files'), $name);
                                $file_addresses[]='files/'.$name;
                            }
                        if (isset($request->{$fillable.'_old'}))
                            $file_addresses = array_merge($file_addresses,$request->{$fillable.'_old'});
                        $record->{$fillable} = $file_addresses;
                    }
                    else{
                        if($request->hasFile($fillable)){
                            $name = time() . '.'.$request->{$fillable}->getClientOriginalName();
                            $request->file($fillable)->move(public_path('files'), $name);
                            $record->{$fillable} ='files/'.$name;
                        }
                        elseif (isset($request->{$fillable.'_old'}))
                            $record->{$fillable} =$request->{$fillable.'_old'};


                    }
                    break;

                default :
                    if (isset($request->{$fillable}))
                        $record->{$fillable} = $request->{$fillable};

            }


        }
        $record->save();
        $this->handlePivots($record,$request,$class);


        return redirect($class::route('index'))->with('message','با موفقیت ویرایش شد');
    }
    private function handlePivots($record,$request,$class){
        foreach ($record->getFillable() as $fillable)
        {
            $field = $class::findField($fillable);
            if(isset($field['pivot'])){
                $model= explode(',',$field['pivot']);
                if (!isset($model[0]) && !isset($model[1]))
                    throw new \Exception($field['name'].' pivot not define properly');
                if (!class_exists ($model[0]))
                    throw new \Exception($field['name'].' pivot model not exist');
                if (!method_exists($model[0],$model[1]))
                    throw new \Exception($field['name'].' pivot method not exist');
                $model[0]::$model[1]($record,$request->{$fillable});
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,$class)
    {
        $record = $class::findOrFail($id);
        $record->delete();
        return redirect($class::route('index'))->with('message','با موفقیت از سیستم حذف شد');

    }

    public function getdata($class){
        return Laratables::recordsOf($class);
    }
    public function condition(Request $request,$field,$class){
        return json_encode($class::condition($field,$request));
    }
}
