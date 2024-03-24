<!-- Modal Body -->
<div class="modal-body">
    <form action="{{ route('admin.dps.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="mahasiswa_id" value="{{$skripsi->mahasiswa_id}}">
        <input type="hidden" name="judul_skripsi" value="{{$skripsi->judul_skripsi}}">

        <div class="form-group">
            <label for="name">NAMA MAHASISWA</label>
            <input type="text" id="name" placeholder="{{$skripsi->mahasiswa->nama_mahasiswa}}" class="form-control" required disabled>
        </div>

        <div class="form-group">
            <label for="name">JUDUL SKRIPSI</label>
            <input type="text" id="name" placeholder="{{$skripsi->judul_skripsi}}" class="form-control" required disabled>
        </div>

        <div class="form-group">
            <label for="dosen_id">DOSEN 1</label>
            <select id="dosen_id" name="dosen_id" class="form-control" required>
                <option value="">--- PILIH DOSEN ---</option>
                @foreach ($dosen as $d)
                    <option value="{{ $d->id }}">{{ $d->nama_dosen}}</option>
                @endforeach
            </select>
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
