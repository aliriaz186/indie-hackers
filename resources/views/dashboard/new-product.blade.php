@extends('dashboard.layout')
@section('content')
    <div style="color: white; margin-top: 20px">
        <h2 class="text-center">Add Your Product</h2>
            <div style="border: 3px solid #5a7693; padding: 60px;margin: 70px auto;align-items: center; display: flex; flex-direction: column;max-width: calc(100% - 32px);width: 600px;">
                    <div>
                        <div>
                            <label>What's the name of your product?</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div style="margin-top: 10px">
                            <label>Describe it in a few words.</label>
                            <input type="text" class="form-control" id="description">
                        </div>
                        <div style="margin-top: 10px">
                            <label>What's the URL?</label>
                            <input type="text" class="form-control" id="url">
                        </div>
                        <div class="learn-more-btn-section" style="margin-top: 20px" onclick="login()">
                            <button class="btn btn-modern" onclick="saveProduct()">Create Product</button>
                        </div>
                    </div>
            </div>
    </div>
    <script>
        function saveProduct() {
            let name = document.getElementById('name').value;
            let description = document.getElementById('description').value;
            let url = document.getElementById('url').value;
            if(name === ''){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Invalid Name!',
                });
                return;
            }
            if(description === ''){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Invalid Description!',
                });
                return;
            }
            if (!/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/gi.test(url))
            {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Invalid URL!',
                });
                return;
            }
            $.ajax({
                url: `{{env('APP_URL')}}/products/save`,
                type: 'POST',
                dataType: "JSON",
                data: {name : name,description : description, url: url, "_token": "{{ csrf_token() }}"},
                success: function (result) {
                    if (result.status === true) {
                        window.location.href = `{{env('APP_URL')}}/profile`
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: result.message,
                        });
                    }
                },
            });
        }
    </script>
@endsection
