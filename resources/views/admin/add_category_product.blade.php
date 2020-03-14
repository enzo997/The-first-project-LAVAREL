@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Add CATEGORY PRODUCT
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
                        <form role="form" action="{{URL::to('/save-category-product')}}" method= "post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name's Product</label>
                                <input type="text" name="category_product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description's Product</label>
                                <textarea style="resize:none;"class="form-control" name="category_product_desc" id="" rows="3" placeholder="Description your Product"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Display</label>
                                <select name ="category_product_status" class="form-control input-lg m-bot15" >
                                    <option value="0">Hidden</option>
                                    <option value="1">Show</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info">Add New +</button>
                        </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection