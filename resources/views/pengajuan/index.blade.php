@extends('layouts.layout_master')

@section('content')

{{-- notification succes --}}
@if(session('status'))
<div class="alert alert-success" role="alert">
    {{session('status')}}
</div>
@endif

<!-- Basic -->
<div class="col-xl">
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Form Pengajuan Cuti</h5>
            <small class="text-muted float-end">Default label</small>
        </div>
        <div class="card-body">

            {{-- notfication gagal --}}
            @if(count($errors) > 0)
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif


            <form method="post" action="pengajuan" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Nama Lengkap</label>
                    <input type="text" class="form-control" name="" id="basic-default-fullname" value="{{ $name }}"
                        disabled />
                    <input type="hidden" name="id_users" value="{{ $id }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">NIP</label>
                    <input type="text" class="form-control" name="nip" id="basic-default-fullname"
                        placeholder="11221114332" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Jenis Cuti</label>
                    <select class="form-select" aria-label="Default select example" name="jenis_cuti">
                        <option selected>Pilih Jenis Cuti</option>
                        <option value="Cuti Tahunan">Cuti tahunan</option>
                        <option value="Cuti Sakit">Cuti sakit</option>
                        <option value="Cuti Melahirkan">Cuti melahirkan</option>
                        <option value="Cuti Keguguran">Cuti keguguran</option>
                        <option value="Cuti Haid">Cuti Haid</option>
                        <option value="Cuti haji/umrah">Cuti haji/umrah</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Keterangan</label>
                    <textarea type="text" class="form-control" id="basic-default-fullname"
                        placeholder="Berikan Keteangan Cuti Anda!" name="keterangan"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Bukti</label>
                    <input type="file" id="input-file-now" class="dropify" name="bukti" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Tanggal Mulai</label>
                    <input class="form-control" type="date" value="2021-06-18" id="html5-date-input"
                        name="tanggal_mulai" />
                </div>
                <div class="mb-3">
                    <label class="form-label" for="basic-default-fullname">Tanggal Selesai</label>
                    <input class="form-control" type="date" value="2021-06-18" id="html5-date-input"
                        name="tanggal_selesai" />
                </div>
                <input type="hidden" name="status" id="" value="Menunggu">
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function(){
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove:  'Supprimer',
                error:   'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element){
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e){
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
</script>
@endpush