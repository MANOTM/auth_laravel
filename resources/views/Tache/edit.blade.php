@extends('layouts.master')
@section('title','edit')
@section('content')
<form class="container card p-5" method="POST" action="{{Route('Tache.update',$tache->id)}}">
    @csrf
    @method('PUT')
    <div class="row mb-4">
        <div class="col">
          <div class="form-outline">
            <input type="text" placeholder="Categorie" value="{{$tache->categorie}}" name="categorie" class="form-control" />
            @error('categorie')
            <div class="form-text text-danger">{{$message}}</div>
         @enderror
          </div>
        </div>
        <div class="col">
          <div class="form-outline">
            <input type="date" value="{{$tache->expiration}}" name="expiration" class="form-control" />
            @error('expiration')
            <div class="form-text text-danger">{{$message}}</div>
         @enderror
          </div>
        </div>
      </div>

    <div class="form-outline mb-4">
      <textarea class="form-control" name="description" placeholder="description" rows="4">{{$tache->description}}</textarea>
      @error('description')
      <div class="form-text text-danger">{{$message}}</div>
   @enderror
    </div>



    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
  </form>
@endsection

