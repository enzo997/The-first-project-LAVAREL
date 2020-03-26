@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">EDIT CATEGORY PRODUCT
                </header>
                <div class="panel-body">
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo $message;
                        Session::put('message',null);
                    }
                ?>
                    <div class="position-center">
                        @foreach ($edit_category_product as $key  =>  $edit_value)    
                            <form role="form" action="{{URL::to('/update-category-product/'.$edit_value->category_id)}}" method= "post">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name's Product</label>
                                    <input type="text" value = "{{ $edit_value->category_name}}" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description's Product</label>
                                <textarea style="resize:none;"class="form-control" name="category_product_desc" id="" rows="3" >{{$edit_value->category_desc}}</textarea>
                                </div>
                                <button type="submit" name="add_category_product" class="btn btn-info">Update</button>
                            </form>
                        @endforeach
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection