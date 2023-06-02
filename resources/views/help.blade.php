@extends('layouts.master')

@section('content')
@include('includes.header', ['pageTitle'=>'Bantuan', 'back'=>'/'])
<div>
    <div class='py-24 bg-grad-pink h-screen w-full px-2 flex flex-col items-center justify-center text-sm px-6 relative overflow-hidden'>
        <div class="absolute -top-[30%] w-[530px] h-[530px] bg-c-pink rounded-full"></div>
        <h1 class="text-white text-2xl z-10 font-bold m-auto">Halo Fiorenza,</h1>
        <h1 class="text-white text-2xl z-10 font-bold m-auto">perlu bantuan?</h1>

        <form class='flex flex-row gap-3 items-center justify-center w-full my-4 z-10'>
            <input type="text" id="inputQuery" placeholder="Masukkan kata kunci pencarian" class="w-full p-3 rounded-xl placeholder:text-gray-400 text-c-earlier-black border border-c-blue-white text-sm pl-12">
            <img src="/images/icon/search.svg" alt="searchicon" class="absolute left-[32px]">
        </form>

        <div class='grid grid-col gap-3 z-10 overflow-y-scroll'>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Apa solusi jika uangnya belum masuk ke rekening tujuan tetapi transaksi sudah berhasil?</p>
                <p class="text-c-earlier-black text-sm">Jika dana belum sampai ke tujuan, penerima dana bisa melakukan konfirmasi ke pihak alphonsus jovian untuk melakukan pengecekan mutasi rekening. </p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Jika saya sudah transfer tapi nominalnya salah, apa yang harus saya lakukan?</p>
                <p class="text-c-earlier-black text-sm">Jika transfer sudah ke kirim, anda dapat meminta pengembalian dana yang kelebihan ke pihak yang ada</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Apa yang harus dilakukan jika lupa password sedangkan ingin log out?</p>
                <p class="text-c-earlier-black text-sm">Anda bisa melakukan penghapusan akun dan melakukan registrasi kembali</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Bagaimana melakukan pembayaran ke pihak yang ditujukan?</p>
                <p class="text-c-earlier-black text-sm">Anda dapat menuju ke menu bayar dan bisa memilih antara melakukan scan QR atau memasukkan nomor tujuan</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Apa yang harus dilakukan jika akun tidak bisa diverifikasi?</p>
                <p class="text-c-earlier-black text-sm">Anda dapat mengontak pihak terkait untuk dapat melakukan verifikasi, jika tidak bisa silahkan menghapus akun dan buat kembali.</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Bagaimana cara untuk mengatasi tidak bisa melakukan transfer atau bayar?</p>
                <p class="text-c-earlier-black text-sm">Jika tidak bisa melakukan bayar, silahkan log out dan login kembali sehingga dapat melakukan transfer</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Bagaimana melakukan pembayaran ke pihak yang ditujukan?</p>
                <p class="text-c-earlier-black text-sm">Anda dapat menuju ke menu bayar dan bisa memilih antara melakukan scan QR atau memasukkan nomor tujuan</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Siapa yang dapat dihubungi jika mengalami kendala dalam pembayaran</p>
                <p class="text-c-earlier-black text-sm">Anda dapat menghubungi polisi jika anda mengalami kendala dalam proses pembayaran</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Bagaimana cara pengajuan refund di aplikasi?</p>
                <p class="text-c-earlier-black text-sm">Anda dapat menghubungi pohak terkait untuk dapat melakukan refund pada aplikasi</p>
            </div>
            <div class='border border-white bg-white shadow-c-25 w-full h-auto rounded-xl py-3 px-2'>
                <p class="text-c-earlier-black text-sm font-semibold">Apa yang dilakukan jika profil tidak dapat di edit?</p>
                <p class="text-c-earlier-black text-sm">Anda dapat log out terlebih dahulu lalu log in kembali dan mencobakan kembali untuk melakukan edit</p>
            </div>

        </div>
    </div>
    @include('includes.floatybar')
    @endsection