@extends('admin.layout')
@section('titlepage', 'Control Pannel')
@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h2>Thêm Nhãn Hàng</h2>

                <form class="form-container" action="{{ route('update_category', $allCategories->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label" for="name">Tên nhãn hàng</label>
                        <input class="form-control" type="text" id="name" name="name" value="{{ $allCategories->name }}"
                            required>
                    </div>

                    

                    <button class="btn" style="background-color: #FF9999; color: white; border: none;" type="submit">Sửa tên nhãn hàng</button>

                </form>
            </div>
            <div class="col-lg-2"></div>


        </div>
    </div>

</main>
@endsection