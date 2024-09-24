<!DOCTYPE html>
<html lang="en">
{{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>API Wilayah Indonesia</title>

</head>

<body>
    <section class="form-wilayah">
        <div class="container">
            <div class="col-md-6 m-auto">
                <h1 class="text-bold text-red text-center mt-5">API Wilayah Indonesia</h1>
                <div class="card p-4 mt-4">
                    <form>
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <select class="form-control" id="provinsi" aria-label="Default select example">
                                <option>- Pilih Provinsi -</option>
                                @foreach ($provinces as $provinsi)
                                    <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kabupaten">Kabupaten/kota</label>
                            <select class="form-control" id="kabupaten" aria-label="Default select example">
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <select class="form-control" id="kecamatan" aria-label="Default select example">
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="desa">Desa</label>
                            <select class="form-control" id="desa" aria-label="Default select example">
                                
                            </select>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<script>
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    })

    $(function() {

        $('#provinsi').on('change', function() {
            let id_provinsi = $('#provinsi').val();

            // ajax
            $.ajax({
                type: 'POST',
                url: "{{ url('getkabupatens') }}",
                data: {
                    id_provinsi: id_provinsi
                },
                cache: false,

                success: function(msg) {
                    $('#kabupaten').html(msg);
                    $('#kecamatan').html('');
                    $('#desa').html('');
                },

                error: function(data) {
                    console.log('error: ', data);
                }
            });
        });


        $('#kabupaten').on('change', function() {
            let id_kabupaten = $('#kabupaten').val();

            // ajax
            $.ajax({
                type: 'POST',
                url: "{{ route('getkecamatan') }}",
                data: {
                    id_kabupaten: id_kabupaten
                },
                cache: false,

                success: function(msg) {
                    $('#kecamatan').html(msg);
                    $('#desa').html('');
                },

                error: function(data) {
                    console.log('error: ', data);
                }
            });
        });


        $('#kecamatan').on('change', function() {
            let id_kecamatan = $('#kecamatan').val();

            // ajax
            $.ajax({
                type: 'POST',
                url: "{{ route('getdesa') }}",
                data: {
                    id_kecamatan: id_kecamatan
                },
                cache: false,

                success: function(msg) {
                    $('#desa').html(msg);
                },

                error: function(data) {
                    console.log('error: ', data);
                }
            });
        });


    });
</script>

</html>
