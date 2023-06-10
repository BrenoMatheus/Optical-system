@extends('pacients.show-pacient')
@section('title', 'Editando:' .$pacient->nome)
@section('exame')
<div class="card text-center fw-bold">
        <form action="/exame/update/{{$exame->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="pacient_id" value="{{$pacient->id}}">
            <div class="card-header text-bg-secondary">            
            <input type="text" class="form-control fw-bold" name="doutor" value="{{$exame->doutor}}" required>
            </div>
            <div class="card-body ">         
                    <div class="row justify-content-end p-3">
                        <div class="col-auto">
                            <input type="date" class="form-control fw-bold" placeholder="Data" name="data" id="data" value="{{ $exame->data }}" required>  
                        </div>
                        <div class="col-auto ">
                            <input type="file" name="image_exame" id="image_exame" class="form-control">
                        </div>
                    </div>
                    <div class="row p-3 justify-content-center">
                        <div class="col-4"> 
                            <img src="../../img/exames/{{$exame->image_exame}}" class="card-img-top" alt="">
                        </div>
                    </div>
                    <!-- diagnosis -->
        <div class="container text-center"> 
            <div class="row p-3 justify-content-center">
                <div class="col-auto"> 
                   
                    <h4><strong>Diagnóstico</strong></h4>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Miopia" name="diagnostico[]" id="Miopia">
                    <label class="form-check-label" for="flexCheckDefault">Miopia</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Hipermetropia" name="diagnostico[]" id="Hipermetropia" >
                    <label class="form-check-label" for="flexCheckDefault">Hipermetropia</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Presbiopia" name="diagnostico[]" id="Presbiopia" >
                    <label class="form-check-label" for="flexCheckDefault">Presbiopia</label>
                    </div>
                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" value="Astigmatismo" name="diagnostico[]" id="Astigmatismo" >
                    <label class="form-check-label" for="flexCheckDefault">Astigmatismo</label>
                    </div>                     
                </div>
                 <!-- function to check the array and populate the checkbox -->
                <script>
                        var m = document.querySelector('#Miopia');
                        var h = document.querySelector('#Hipermetropia');
                        var p = document.querySelector('#Presbiopia');
                        var a = document.querySelector('#Astigmatismo');
                    @foreach($exame->diagnostico as $dg)
                        @switch($dg) 
                        @case($dg == 'Miopia')        
                        m.checked = true;                                        
                        @break
                        @case($dg == 'Hipermetropia')
                        h.checked = true;
                        @break
                        @case($dg == 'Presbiopia')
                        p.checked = true;
                        @break;
                        @case($dg == 'Astigmatismo')
                        a.checked = true;
                        @break
                        @default
                        @endswitch
                    @endforeach
                </Script> 
            </div>
        <div class="row p-3 justify-content-center">
        <div class="col-auto">
            <h4><strong>Indicação</strong></h4>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Multifocal" name="indicacao[]" id="Multifocal">
            <label class="form-check-label" for="flexCheckDefault">Multifocal</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Bifocal" name="indicacao[]" id="Bifocal">
            <label class="form-check-label" for="flexCheckDefault">Bifocal</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="V.S" name="indicacao[]" id="VS">
            <label class="form-check-label" for="flexCheckDefault">V.S.</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Fotossensível" name="indicacao[]" id="Fotossensível">
            <label class="form-check-label" for="flexCheckDefault">Fotossensível</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="A.R." name="indicacao[]" id="AR">
            <label class="form-check-label" for="flexCheckDefault">A.R.</label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" value="Incolor" name="indicacao[]" id="Incolor">
            <label class="form-check-label" for="flexCheckDefault">Incolor</label>
            </div>
        </div>
        </div>
    
        <script>
                        var inc = document.querySelector('#Incolor');
                        var ar = document.querySelector('#AR');
                        var ft = document.querySelector('#Fotossensível');
                        var mf = document.querySelector('#Multifocal');
                        var vs = document.querySelector('#VS');
                        var bf = document.querySelector('#Bifocal');
                    @foreach($exame->indicacao as $ind)
                        @switch($ind) 
                        @case($ind == 'Incolor')        
                        inc.checked = true;                                        
                        @break
                        @case($ind == 'A.R.')        
                        ar.checked = true;                                        
                        @break
                        @case($ind == 'Fotossensível')        
                        ft.checked = true;                                        
                        @break
                        @case($ind == 'Multifocal')        
                        mf.checked = true;                                        
                        @break
                        @case($ind == 'V.S')        
                        vs.checked = true;                                        
                        @break
                        @case($ind == 'Bifocal')        
                        bf.checked = true;                                        
                        @break
                        @endswitch
                    @endforeach
                </Script> 
        <div class="row p-1 justify-content-center">
            <h4><strong>Observação</strong></h4>
            <textarea class="form-control" name="observacao" id="observacao" rows="3">{{$exame->observacao}}</textarea>
        </div>
        <div class="row p-1 justify-content-center">
                 <input type="submit" class="btn btn-outline-warning btn-sm col-3" id="btn" value="Editar" />
             </div>
        </div>
        </form>
        </div>           

@endsection