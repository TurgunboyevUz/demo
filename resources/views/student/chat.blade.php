@extends('layouts::student.app')

@section('content')
<div class="content-wrapper" style="padding: 0;">
    <section class="content-header">
        <h1>Professor bilan Chat</h1>
    </section>

    <section class="content" style="padding: 0;">
        <div class="container-fluid my-6">
            <div class="card mt-3">
                <div class="card-header">
                    <h3 class="card-title">Chat</h3>
                </div>
                <div class="card-body" style="max-height: 500px; overflow-y: auto;">
                    <!-- Chat Message Area -->
                    <div id="chatMessages" class="p-3" style="height: 400px; overflow-y: auto;">
                        <!-- Foydalanuvchi va professor xabarlari -->
                        <div class="message my-2 d-flex align-items-start">
                            <img src="dist/img/user3-128x128.jpg" alt="Professor Profil" class="rounded-circle mr-2" style="width: 40px; height: 40px;">
                            <div>
                                <strong>Professor:</strong>
                                <p>Salom Hurmatli talaba! Bugungi mavzu sizga tushunarli bo'ldimi mavzuga oid qandaydir savollaringiz bormi?</p>
                            </div>
                        </div>
                        <div class="message my-2 d-flex align-items-start flex-row-reverse">
                            <img src="img/image.jpg" alt="Foydalanuvchi Profil" class="rounded-circle ml-2" style="width: 40px; height: 40px;">
                            <div class="text-right">
                                <strong>Siz:</strong>
                                <p>Assalomu alaykum, Professor. Ha menda bugungi uyga vazifa borasida bir nechta savollarim bor edi. mumkinmi?!</p>
                            </div>
                        </div>
                        <!-- Yangi xabarlar shu joyga qo'shiladi -->
                    </div>
                </div>

                <!-- Yozish maydoni va jo'natish tugmasi -->
                <div class="card-footer">
                    <form id="chatForm" class="d-flex">
                        <input type="text" id="messageInput" class="form-control" placeholder="Xabar yozing..." required>
                        <button type="submit" class="btn btn-primary ml-2">
                            <i class="fas fa-paper-plane"></i> Jo'natish
                        </button>
                    </form>
                </div>
            </div>
        </div> <br>
    </section>
</div>
@endsection