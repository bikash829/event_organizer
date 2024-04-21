@php 
$id = $id ?? $name ?? rand();
@endphp

<div class=" my-2 form-group">
    @if ($label)
        <label for="input_{{$id}}">

           <strong>{{$label}} {{$id}}</strong> 
           @if ($isRequired)
               <strong class="text-danger">*</strong>
           @endif
        </label>
    @endif
    @if (in_array($type,['text','password','email','number','date','datetime-local','hidden','search']))
    <input 
    value="{{old($name,$value)}}" 
    type="{{$type}}" 
    class="form-control @error($errorKey ?? $name) is-invalid @enderror" 
    id="input_{{$id}}" 
    name="{{$name}}"
    {{$attributes}}
    >

    @elseif ($type == 'textarea')
        <textarea class="form-control @error($errorKey ?? $name) is-invalid @enderror" id="input_{{$id}}" name="{{$name}}"
        {{$attributes}}
        
        >{{old($name,$value)}}</textarea>
    @else
    <div class="text-danger">
        <span>Invalid Input Type</span>        
    </div>
    @endif
    

    @error($errorKey ?? $name)
        <div class="error invalid-feedback">{{ $errors->first('title') }}</div>
    @enderror
</div>

