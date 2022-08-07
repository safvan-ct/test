<link rel="stylesheet" href="{{ asset('assets/whatsapp/awesome.min.css') }}">

<link rel='stylesheet' href='{{ asset('assets/whatsapp/family.css') }}'><link rel="stylesheet" href="{{ asset('assets/whatsapp/whatsapp.css') }} ">

<!-- partial:index.partial.html -->
<div id='whatsapp-chat' class='hide'>
  <div class='whatsapp-chat-header'>
      <div class='whatsapp-chat-avatar'>
        <img src='{{asset('/storage/images/kens.png')}}' alt=" Logo" />
      </div>
      <p><span class="whatsapp-chat-name">Kens Boutique</span><br><small style="color:#fff;">Typically replies within an hour</small></p>
  </div>
  
  <div class='start-chat'>
    <div pattern="whatsapp/whatsapp.png" class="WhatsappChat__Component-sc-1wqac52-0 whatsapp-chat-body">
      <div class="WhatsappChat__MessageContainer-sc-1wqac52-1 dAbFpq">
        <div style="opacity: 0;" class="WhatsappDots__Component-pks5bf-0 eJJEeC">
          <div class="WhatsappDots__ComponentInner-pks5bf-1 hFENyl">
            <div class="WhatsappDots_Dot-pks5bf-2 WhatsappDots_DotOne-pks5bf-3 ixsrax"></div>
            <div class="WhatsappDots_Dot-pks5bf-2 WhatsappDots_DotTwo-pks5bf-4 dRvxoz"></div>
            <div class="WhatsappDots_Dot-pks5bf-2 WhatsappDots_DotThree-pks5bf-5 kXBtNt"></div>
          </div>
        </div>
        <div style="opacity: 1;" class="WhatsappChat__Message-sc-1wqac52-4 kAZgZq">
          <div class="WhatsappChat__Author-sc-1wqac52-3 bMIBDo">Kens Boutique</div>
          <div class="WhatsappChat__Text-sc-1wqac52-2 iSpIQi">Hi there <br><br>How can I help you?</div>
          <div class="WhatsappChat__Time-sc-1wqac52-5 cqCDVm">1:40</div>
        </div>
      </div>
    </div>

    <div class='blanter-msg'>
      <textarea id='chat-input' class="txa" placeholder='Write a response' maxlength='120' row='1'></textarea>
      <a href='javascript:void;' id='send-it'><svg viewBox="0 0 448 448"><path d="M.213 32L0 181.333 320 224 0 266.667.213 416 448 224z"/></svg></a>

    </div>
  </div>
  <div id='get-number'></div>
  <a class='close-chat' href='javascript:void'>—</a>
</div>
<a class='blantershow-chat'  onload='javascript:void' href='javascript:void' title='Show Chat'><img src="{{ asset('/storage/images/whtsapp.png') }}" style="width: 36px;
    height: 30px;
    padding-right: 5px;"/>  <b>Chat with Us</b></a>
<!-- partial -->
  <script src='{{ asset('assets/whatsapp/jquery.js') }}'></script><script  src="{{ asset('assets/whatsapp/script.js') }}"></script>