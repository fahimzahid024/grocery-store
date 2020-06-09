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
        	$published_category = DB::table('tbl_category')->where('publication_status',1)->get();

        ?>

<div class="col-12 col-lg-6 grid-margin" style="">
      <div class="card" style="box-shadow: 0 20px 26px 0">
          <div class="card-body">
              <h2 class="card-title" style="text-align: center; font-size: bold;">ADD PRODUCT</h2>
              <form class="forms-sample" method="post" action="{{ URL::to('/save-product') }}">
                {{ csrf_field() }}

                <div class="form-group">
                		<label for="exampleInputEmail1">Product Category</label>
                		<select id="example1">
                			@foreach($published_category as $v_category)
			              		<option value="1">{{ $v_category -> category_name }}</option>
			              	@endforeach
              	  		</select>
                </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Product Name</label>
                      <input style="border: 1px solid #1b6bbb;" type="text" class="form-control p-input" id="exampleInputText" aria-describedby="emailHelp" placeholder="Enter product name" name="category_name" required="">
                  </div>
                  

                  <div class="form-group">
                      <label for="exampleInputEmail1">Product Price</label>
                      <input style="border: 1px solid #1b6bbb;" type="text" class="form-control p-input" id="exampleInputText" aria-describedby="emailHelp" placeholder="Enter product price" name="category_name" required="">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Product Size</label>
                      <input style="border: 1px solid #1b6bbb;" type="text" class="form-control p-input" id="exampleInputText" aria-describedby="emailHelp" placeholder="Enter product size" name="category_name" required="">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Product Quantity</label>
                      <input style="border: 1px solid #1b6bbb;" type="text" class="form-control p-input" id="exampleInputText" aria-describedby="emailHelp" placeholder="Enter product quantity" name="category_name" required="">
                  </div>

                  <div class="form-group">
                      <label for="exampleInputEmail1">Product Color</label>
                      <input style="border: 1px solid #1b6bbb;" type="text" class="form-control p-input" id="exampleInputText" aria-describedby="emailHelp" placeholder="Enter product color" name="category_name" required="">
                  </div>

                  <div class="form-group">
                      <label for="exampleTextarea">Product Short Description</label>
                      <textarea style="border: 1px solid #1b6bbb;" class="form-control p-input" id="exampleTextarea" rows="3" name="product_short_description" required=""></textarea>
                  </div>
                  <div class="form-group">
                      <label for="exampleTextarea">Product Long Description</label>
                      <textarea style="border: 1px solid #1b6bbb;" class="form-control p-input" id="exampleTextarea" rows="3" name="product_long_description" required=""></textarea>
                  </div>

                  <div class="form-check">
                      <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" name="publication_status" value="1" required="">
                        Publication Status
                      </label>
                  </div>
                  
				  <div class="form-group">
                      <div>
                      	<label for="exampleInputEmail1">Product Image</label>
                      </div>
                      <input class="input-file uniform_on" name="product_image" id="fileInput" type="file" required="">
                  </div>

                <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div>
      </div>
  </div>

@endsection