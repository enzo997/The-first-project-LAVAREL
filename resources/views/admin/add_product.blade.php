@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Add PRODUCT
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
                        {{-- để thêm hình ảnh cần phải thêm trường enctype = "multipart/form-data" --}}
                        <form role="form" action="{{URL::to('/save-product')}}" method= "post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name's Product</label>
                                <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description's Product</label>
                                <textarea style="resize:none;"class="form-control" name="product_desc" id="" rows="3" placeholder="Description your Product"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">content's Product</label>
                                <textarea style="resize:none;"class="form-control" name="product_content" id="" rows="3" placeholder="Description your Product"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Image's Product</label>
                                <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Price's Product</label>
                                <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Category' product</label>
                                <select name ="category_product" class="form-control input-lg m-bot15" >
                                    @foreach ($category_product as $key => $cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>             
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Brand's Product</label>
                                <select name ="brand_product" class="form-control input-lg m-bot15" >
                                    @foreach ($brand_product as $key => $brand)
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>             
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Display</label>
                                <select name ="product_status" class="form-control input-lg m-bot15" >
                                    <option value="0">Hidden</option>
                                    <option value="1">Show</option>
                                </select>
                            </div>
                            <button type="submit" name="add_product" class="btn btn-info">Add Product</button>
                        </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection