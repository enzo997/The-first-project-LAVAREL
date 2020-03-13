@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">Add CATEGORY PRODUCT
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name's Product</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Description's Product</label>
                            <textarea style="resize:none;"class="form-control" name="category-product-desc" id="" rows="3" placeholder="Description your Product"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Display</label>
                            <select class="form-control input-lg m-bot15" >
                                <option>Hidden</option>
                                <option>Show</option>
                            </select>
                        </div>
                        <button type="submit" name="add-category" class="btn btn-info">Add New +</button>
                    </form>
                    </div>

                </div>
            </section>

    </div>
</div>
@endsection