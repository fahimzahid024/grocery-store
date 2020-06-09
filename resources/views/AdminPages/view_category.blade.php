@extends('dashboard')
@section('admin_content')
      <p  class="badge-success" style="text-align: center;">
        <?php

          $message=Session::get('message');
          if($message)
          {
            echo $message;
            Session::put('message',null);
            
          }
          ?>
        </p>



          <h1 class="page-title">Data table</h1>
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Data table</h2>
              <div class="row">
                <div class="col-12">
                  <table id="order-listing" class="table table-striped" style="width:100%;">
                    <thead>
                      <tr>
                          <th>Category ID</th>
                          <th>Category Name</th>
                          <th>Category Description</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($all_category as $v_category)
                      <tr>
                          <td>{{ $v_category -> category_id }}</td>
                          <td>{{ $v_category -> category_name }}</td>
                          <td>{{ $v_category -> category_description }}</td>
                          <td>
                            @if($v_category -> publication_status == 1)
                              <label class="badge badge-success">Available</label>
                            @else
                              <label class="badge badge-secondary">Not Available</label>
                            @endif

                          </td>

                          <td>
                            <a href="{{ URL::to('/delete-category/'.$v_category -> category_id) }}"><button class="btn btn-outline-danger">Delete</button></a>
                            <a href="{{ URL::to('/edit-category/'.$v_category -> category_id) }}"><button class="btn btn-outline-info">Edit</button></a>
                            @if($v_category->publication_status == 1)
                              <a href="{{ URL::to('/unactive-category/'.$v_category -> category_id) }}"><button class="btn btn-outline-primary">Unactive</button></a>
                            @else
                              <a href="{{ URL::to('/active-category/'.$v_category -> category_id) }}"><button class="btn btn-outline-secondary">Active</button></a>
                            @endif

                          </td>
                      </tr>
                      @endforeach

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
@endsection