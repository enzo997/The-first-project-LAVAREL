@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Add PRODUCT BRAND
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
                        <form role="form" action="{{URL::to('/save-brand-product')}}" method= "post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name's Brand</label>
                                <input type="text" name="brand_product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description's Brand</label>
                                <textarea style="resize:none;"class="form-control" name="brand_product_desc" id="" rows="3" placeholder="Description your Product"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Display</label>
                                <select name ="brand_product_status" class="form-control input-lg m-bot15" >
                                    <option value="0">Hidden</option>
                                    <option value="1">Show</option>
                                </select>
                            </div>
                            <button type="submit" name="add_brand_product" class="btn btn-info">Add</button>
                        </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection