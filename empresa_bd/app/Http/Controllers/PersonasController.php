<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Persona;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Events\PersonaSaved;
use App\Http\Requests\CreatePersonaRequest;

class PersonasController extends Controller
{

    public function __construct(){
        //$this->middleware('auth')->only('create','edit');
        $this->middleware('auth')->except('index','show');
    }
    
    public function index(){
        // $personas =[
        //     ['titulo'=>'Persona 1'],
        //     ['titulo'=>'Persona 2'],
        //     ['titulo'=>'Persona 3']
        // ];
        //$personas =DB::table('persona')->get();
        //$personas =Persona::latest()->paginate(2);
        
        $personas =Persona::orderBy('cPerNombre', 'asc')->simplePaginate(2);        
        return view('personas', compact('personas'));
        
        //return view('personas', compact('personas'));
    }

    public function show($id){        

        return view('show',[
            'persona' =>  Persona::find($id)
        ]);       
    }

    public function create(){        
        return view('create',[
            'persona' => new Persona
        ]);          
    }

    public function edit(Persona $persona){        
        return view('edit',[
            'persona' => $persona
        ]);       
    }

    // public function update(Persona $persona, CreatePersonaRequest $request ){        
    //     if ($request->hasFile('image')) {
    //         // Elimina la imagen actual si existe
    //         if ($persona->image) {
    //             Storage::delete($persona->image);
    //         }
            
    //         // Almacena la nueva imagen y actualiza el campo de la imagen
    //         $persona->image = $request->file('image')->store('images');
    //     }
    
    //     // Actualiza otros campos, incluidos los nuevos valores de imagen si hay uno
    //     $persona->fill($request->validated());
    //     $persona->save();
    
    //     return redirect()->route('personas.show', $persona)->with('estado', 'La persona fue actualizada correctamente');
    // }
    
    public function update(Persona $persona, CreatePersonaRequest $request ){        
        
        //$persona->update( array_filter($request->validated()));

        if( $request->hasFile('image') ){

            // Elimina la imagen actual si existe
            if ($persona->image) {
                Storage::delete($persona->image);
            }
            $persona->fill( $request->validated());
            $persona->image = $request->file('image')->store('images');
            $persona->save();   
            
            // $image = Image::make(storage::get($persona->image))
            // ->widen(600)
            // ->limitColors(255)
            // ->encode();

            // Storage::put($persona->image, (string) $image);
        
            PersonaSaved::dispatch($persona);

        }
        else{
            $persona->update( array_filter($request->validated()) );
        }

        return redirect()->route('personas.show',$persona)->with('estado','La persona fue actualizado correctamente');
        //return redirect()->route('personas.show',$id);       
        
    }

    public function store(CreatePersonaRequest $request){        
        //Persona::create($request->validated());
        $persona = new Persona($request->validated());
        $persona->image = $request->file('image')->store('images');
        $persona->save();
        
        
        // $image = Image::make(storage::get($persona->image))
        // ->widen(600)
        // ->limitColors(255)
        // ->encode();

        // Storage::put($persona->image, (string) $image);
        
        PersonaSaved::dispatch($persona);

        return redirect()->route('personas.index')->with('estado','La persona fue creada correctamente');
        //return redirect()->route('personas.index');  
        /* 
            $nombre=request('nombre'); $apellido=request('apellido'); $direccion=request('direccion');
            Persona::create([
                'cPerNombre'=>$nombre,
                'cPerApellido'=>$apellido,
                'cPerDireccion'=>$direccion
            ]);
        */

        /*
            $newPerson=request()->validate([
                'cPerNombre' => 'required|string|max:10',
                'cPerApellido'=>'required|string|max:10',
                'cPerDireccion'=>'required|string|max:10',
                'nPerEdad' => 'required|integer|min:18',
                'nPerSueldo' => 'required|numeric|min:500',
                'nPerEstado' => 'required|in:0,1',
                'dPerFecNac' => 'required|date|before:today'
            ], [
                'cPerNombre.required' =>  'El nombre es obligatorio.',
                'cPerNombre.max' =>  'El nombre no debe ser mayor a 10 caracteres.',
                'cPerApellido.required' =>  'El Apellido es obligatorio.',
                'cPerApellido.max' =>  'El apellido no debe ser mayor a 10 caracteres.',
                'cPerDireccion.required' =>  'La direccion es obligatoria.',
                'cPerDireccion.max' =>  'La direccion no debe ser mayor a 10 caracteres.',

                'nPerEdad.required' =>  'La edad es obligatoria.',
                'nPerEdad.min' =>  'La edad minima es de 18 años.',
                'nPerSueldo.required' =>  'El sueldo es obligatorio.',
                'nPerSueldo.min' =>  'El sueldo no puede ser menor a 500 soles.',

                'dPerFecNac.required' => 'La fecha de nacimiento es obligatoria.',
                'dPerFecNac.date' => 'La fecha de nacimiento debe ser una fecha válida.',
                'dPerFecNac.before' => 'La fecha de nacimiento debe ser anterior a hoy.'
            ]);
        */
             
    }

    public function destroy(Persona $persona){
        Storage::delete( $persona->image );        
        $persona->delete();

        return redirect()->route('personas.index')->with('estado','La persona fue eliminada correctamente');
        return redirect()->route('personas.index');        
    }


}
