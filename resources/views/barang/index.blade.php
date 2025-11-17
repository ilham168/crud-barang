@extends('layouts.app') 
 
@section('content') 
<div class="container"> 
    <h3>Daftar Barang</h3> 
    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">Tambah Barang</a> 
 
    @if (session('success')) 
        <div class="alert alert-success">{{ session('success') }}</div> 
    @endif 
 
    <table class="table table-bordered"> 
        <thead> 
            <tr> 
                <th>ID</th> 
                <th>Jenis</th> 
                <th>Nama</th> 
                <th>Satuan</th> 
                <th>Harga Pokok</th> 
                <th>Harga Jual</th> 
                <th>Stok</th> 
                <th>Aksi</th> 
            </tr> 
        </thead> 
        <tbody> 
            @foreach ($barang as $b) 
            <tr> 
                <td>{{ $b->id }}</td> 
                <td>{{ $b->jenis->nama_jenis }}</td> 
                <td>{{ $b->nama_barang }}</td> 
                <td>{{ $b->satuan }}</td> 
                <td class="text-end">{{ number_format($b->harga_pokok) }}</td> 
                <td class="text-end">{{ number_format($b->harga_jual) }}</td> 
                <td class="text-end">{{ $b->stok }}</td> 
                <td> 
                    <a href="{{ route('barang.show', $b->id) }}"  
                     class="btn btn-sm btn-info text-white">Lihat</a> 
                    <a href="{{ route('barang.edit', $b->id) }}"  
                    class="btn btn-sm btn-warning">Edit</a> 
                    <form action="{{ route('barang.destroy', $b->id) }}"  
                        method="POST" class="d-inline"> 
                        @csrf @method('DELETE') 
                        <button class="btn btn-sm btn-danger"  
                        onclick="return confirm('Yakin hapus data ini?')">Hapus</button> 
                    </form> 
                </td> 
            </tr> 
            @endforeach 
        </tbody> 
    </table> 
 
    {{ $barang->links() }} 
</div> 
@endsection