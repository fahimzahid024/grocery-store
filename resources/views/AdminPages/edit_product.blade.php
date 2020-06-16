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

        <?php
        	$published_product = DB::table('tbl_product')->get();
        	foreach ($published_product as $v_product) {}
        	$published_category = DB::table('tbl_category')->where('publication_status',1)->get();

        ?>

<div class="col-12 col-lg-6 grid-margin" style="">
      <div class="card" style="box-shadow: 0 20px 26px 0">
          <div class="card-body">
              <h2 class="card-title" style="text-align: center; font-size: bold; color: #0c6ed4;">ADD PRODUCT</h2>
              <form class="forms-sample" method="post" action="{{ URL::to('/update-product/'.$v_product -> product_id) }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                		<label for="exampleInputEmail1">Product Category</label>
                		<select id="example1" name="category_id">
                			@foreach($published_category as $v_category)
			              		<option value="{{ $v_category -> category_id }}">{{ $v_category -> category_name }}</option>
			              	@endforeach
              	  		</select>
                </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Product Name</label>
                      <input style="border: 1px solid #1b6bbb;" type="text" class="form-control p-input" id="exampleInputText" aria-describedby="emailHelp" placeholder="Enter product name" name="product_name" value="{{ $v_product -> product_name }}" required="">
                  </div>
                  

                  <div class="form-group">
                      <label for="exampleInputEmail1">Product Price</label>
                      <input style="border: 1px solid #1b6bbb;" type="text"  class="form-control p-input" id="exampleInputText" aria-describedby="emailHelp" placeholder="Enter product price" name="product_price" value="{{ $v_product -> product_price }}" required="">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Product Size</label>
                      <input style="border: 1px solid #1b6bbb;" type="text" class="form-control p-input" id="exampleInputText" aria-describedby="emailHelp" placeholder="Enter product size" name="product_size" value="{{ $v_product -> product_size }}" required="">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Product Quantity</label>
                      <input style="border: 1px solid #1b6bbb;" type="text" class="form-control p-input" id="exampleInputText" aria-describedby="emailHelp" placeholder="Enter product quantity" name="product_quantity" value="{{ $v_product -> product_quantity }}" required="">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Product Color</label>
                      <input style="border: 1px solid #1b6bbb;" type="text" class="form-control p-input" id="exampleInputText" aria-describedby="emailHelp" placeholder="Enter product color" name="product_color" value="{{ $v_product -> product_color }}" required="">
                  </div>

                  <div class="form-group">
                      <label for="exampleTextarea">Product Short Description</label>
                      <textarea style="border: 1px solid #1b6bbb;" type="text" class="form-control p-input" id="exampleTextarea" rows="3" name="product_short_description"
                       required="">{{ $v_product -> product_short_description }}</textarea>
                  </div>
                  <div class="form-group">
                      <label for="exampleTextarea">Product Long Description</label>
                      <textarea style="border: 1px solid #1b6bbb;" type="text" class="form-control p-input" id="exampleTextarea" rows="3" name="product_long_description" required="">{{ $v_product -> product_long_description }}</textarea>
                  </div>

                  <div>
                   	Old Image : 
                   	 <th><img src="{{ $v_product -> product_image }}" style="height: 80px; width: 80px;"></img></th>
                   </div>
                  
                  <div class="form-group row mb-4">
                        <div class="col-sm-8">
                           <label class="control-label" for="fileInput">Image</label>
                           <div class="controls">
                              <input class="input-file uniform_on" name="product_image" id="fileInput" type="file">
                          </div>
                    </div>
                  </div>

                  <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" type="text" name="publication_status" value="1" required="">
                        Publication Status
                      </label>
                  </div>

                   
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div>
      </div>
  </div>

@endsection