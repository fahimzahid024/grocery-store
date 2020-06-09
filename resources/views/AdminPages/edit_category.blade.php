@extends('dashboard')
@section('admin_content')


<p  class="badge-success" style="text-align: center;">
<?php

  $message = Session::get('message');
  if($message)
  {
    echo $message;
    Session::put('message',null);
  }
  ?>
</p>


@foreach($edit_category as $v_category)
@endforeach
<div class="col-12 col-lg-6 grid-margin" style="">
      <div class="card" style="box-shadow: 0 20px 26px 0">
          <div class="card-body">
              <h2 class="card-title" style="text-align: center; font-size: bold;">ADD CATEGORY</h2>
              <form class="forms-sample" method="post" action="{{ URL::to('/update-category/'.$v_category->category_id) }}">
                {{ csrf_field() }}
                  <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <input style="border: 1px solid #1b6bbb;" type="text" value="{{ $v_category->category_name }}" class="form-control p-input" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter product name" name="category_name" required="">
                  </div>
                  <div class="form-group">
                      <label for="exampleTextarea">Category Description</label>
                      <textarea style="border: 1px solid #1b6bbb;" class="form-control p-input"  id="exampleTextarea" rows="3" name="category_description" required="">{{ $v_category->category_description }}</textarea>
                  </div>
                  <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="publication_status" value="1" required="">
                        Publication Status
                      </label>
                  </div>
                <button type="submit" class="btn btn-success">Update Category</button>
            </form>
          </div>
      </div>
  </div>
@endsection