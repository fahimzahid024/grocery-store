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



          <h1 class="page-title">Product Table</h1>
          <div class="card">
            <div class="card-body">
              <h2 class="card-title">Product Table</h2>
              <div class="row">
                <div class="col-12">
                  <table id="order-listing" class="table table-striped" style="width:100%;">
                    <thead>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Price</th>
                          <th>Qty</th>
                          <th>Size</th>
                          <th>Image</th>
                          <th>Status</th>
                          <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($all_product as $v_product)
                      <tr>
                          <td>{{ $v_product -> product_id }}</td>
                          <td>{{ $v_product -> product_name }}</td>
                          <td>{{ $v_product -> product_price }}</td>
                          <td>{{ $v_product -> product_quantity }}</td>
                          <td>{{ $v_product -> product_size }}</td>
                          <td ><img src="{{ $v_product -> product_image }}" style="height: 80px; width: 80px;"></td>

                          <td>
                            @if($v_product -> publication_status == 1)
                              <label class="badge badge-success">Available</label>
                            @else
                              <label class="badge badge-secondary">Not Available</label>
                            @endif

                          </td>

                          <td>
                            <a href="{{ URL::to('/delete-product/'.$v_product -> product_id) }}"><button class="btn btn-outline-danger">Delete</button></a>
                            <a href="{{ URL::to('/edit-product/'.$v_product -> product_id) }}"><button class="btn btn-outline-info">Edit</button></a>
                            @if($v_product->publication_status == 1)
                              <a href="{{ URL::to('/unactive-product/'.$v_product -> product_id) }}"><button class="btn btn-outline-primary">Unactive</button></a>
                            @else
                              <a href="{{ URL::to('/active-product/'.$v_product -> product_id) }}"><button class="btn btn-outline-secondary">Active</button></a>
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