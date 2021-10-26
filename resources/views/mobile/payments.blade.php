@extends('layouts.mobile')

@section('content')
<div class="page-content footer-clear">

    <!-- Page Title-->
    <div class="pt-3">
        <div class="page-title d-flex">
            <div class="align-self-center me-auto">
                <p class="color-highlight">Paiments de</p>
                <h1 class="color-theme">Factures</h1>
            </div>
            <div class="align-self-center ms-auto">

                <a href="#"
                data-bs-toggle="dropdown"
                class="icon gradient-blue shadow-bg shadow-bg-s rounded-m">
                    <img src="{{asset('assets/mobile/images/pictures/25s.jpg')}}" width="45" class="rounded-m" alt="img">
                </a>
                <!-- Page Title Dropdown Menu-->
                <div class="dropdown-menu">
                    <div class="card card-style shadow-m mt-1 me-1">
                        <div class="list-group list-custom list-group-s list-group-flush rounded-xs px-3 py-1">

                            <a href="page-profile.html" class="list-group-item">
                                <i class="has-bg gradient-yellow shadow-bg shadow-bg-xs color-white rounded-xs bi bi-person-circle"></i>
                                <strong class="font-13">Mon Compte</strong>
                            </a>
                            <a href="page-signin-1.html" class="list-group-item">
                                <i class="has-bg gradient-red shadow-bg shadow-bg-xs color-white rounded-xs bi bi-power"></i>
                                <strong class="font-13">Déconnexion</strong>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center">
        <div class="col-6 mb-n2">
            <a href="page-payment-exchange.html" class="card card-style me-0" style="height:180px">
                <div class="card-center" style="background-image: url('https://pbs.twimg.com/profile_images/960826149126529024/wy38u0CA_400x400.jpg'); background-position: center; background-size: cover; height:100%">

                </div>

            </a>
        </div>
        <div class="col-6 mb-n2">
            <a href="page-payment-bill.html" class="card card-style ms-0" style="height:180px">
                <div class="card-center" style="background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAALQAAAC0CAMAAAAKE/YAAAAAgVBMVEUAAAD///8MCg/c29yop6iWlZcxLzLv7+9iYGMLCQ3Ozs9NS07S0tL09PTW1dYmJChramw6ODt0c3e1tLaenJ6LiYvq6uuFhIbh4eFmZWdHRUlcW15PTVHCwsOura6Uk5VBQEPHxsc3NTl9fH4jICQuKzAdGx0YFhtWVFe6ubtycHNvmH8sAAAEcUlEQVR4nO2Y63LiMAyFHRMuBgKlCU0IpRB6ofD+D7jBknwJ7LTQzuzszPl+dEBBlnJsy3KVAgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACA/xdN/Os0bkCrwfq1XxTLU62ixPWVdzFE16C+cLsqysKyvyvp9XGYMFU6CR70U+LTm+q+ZekMezKMrrg9ByHIso7iTjLL0+DmjPVuk0S8zOXJozM5ifSWTSWb9AN9X/qfPIhb4W0pWR4jrSdkzG5OWp+ypIPTuieWmf/9C5uGHMks6fvKpzMTt8a7sTCB9j7p4a1J69duyskTK22cYknml91YbCllKRrW8oPATUZy758tfiNpvb7IORnLw5m3rUXHeeVsNdma7hQHbm7OBln3LX6Q9JvPYZan+TQLJPSKtStWqsPeL6YNWWiEnpMhdHNLuO7o8ZOkdSnDv9Tnyqf2r73klSMFiiW5eDwHxpHxb+GXb+iWym4dcZQ4uiT9flPSSoR+lBJq1JJWpyxNKoaVxAl17AVvkXaKyZP9O+2Is43KufgO45X+BW5Fl8FgMqOk2IZL3I4fLoOkz27ybmXsdlxGE2/CiqdHU0aqU8WM4yX/l6T75DS7fCTJrFgNrmhaKp7k1Kl4IvSIZ15OJa54nzbpy4LFZN9JWjWXQgukWPXB+75vQo8pK1cYeYs6cusd2E32Ry+YL+POrC7DbyVdBQJEuHPOHCiNJvI4zvnc3xmq21zxxK0UNz5Ko4r3w6Q5dHZlI1DMrO1z0iCeRE8V76zjR1zxyG3o3HjhccWjb7+TdLLrPpAVnZqDNCA0/xNR8o0nvKQhNpFboQ+GFi4dpXpF9vw3kpblsb5YHlxsJ0abHX2kjc/RVzqqfa7i8fwsvJsdWioeNVA/3YjcSBSdjegymo6bZhykJdHPsjdhOFvxxC1rGudmmz/pT3hb7kfEmitPdlqz4Ts564K9dh2pw1NN8lc++nnb6fBs5Ip3xY1WxCaQXblLgszGcG5uuDjJbCfT91Brs7oMzvWBotttF5XsWnVOS4F2aFjxAu7rPeZPPHa1sq+v6uLc8U6vRKe6SNFp2y1870RvdEVoqkwD2q3DNxPreV/SxjVMSZX3t3nvrIa+JjSdQFLxbFyzdc/OepprQrdno3YVLzvmFtd633sJ6Kpzrscs9Li96lpoOnIfnRsNN08kPQ+Vl0tLn16wbWq7Krjry71J74bxgM1BVnQ75XzPTkVN6TC50fAFNzW+veNdZTS9+zFsgGlgdw26+7pVV9GI7XHCQkuz2d4iKdbCrSY3v7L4z9Kz0K775EpT+R6PqVzwe5NWepCHI5ZKlubO/YQr04OW6BLEtbbtYXNy88PwmZi05dTdKy3++vLc9bmBz1zWSNYsdDG29IMfHK3lpNXWfsj9k7RnaV8wp0/+PwmqJktbnI+9gMqPvCPL+Mabi0Wr93VZpEW5uukK8c/R5tsnEgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAgP+dP/i2OPoKXoXmAAAAAElFTkSuQmCC'); background-position: center; background-size: cover; height:100%">

                </div>

            </a>
        </div>
        <div class="col-6 mb-n2">
            <a href="page-payment-request.html" class="card card-style me-0" style="height:180px">
                <div class="card-center" style="background-image: url('https://sn.jumia.is/unsafe/fit-in/500x500/filters:fill(white)/product/26/09395/1.jpg?8005'); background-position: center; background-size: cover; height:100%">

                </div>

            </a>
        </div>
        <div class="col-6 mb-n2">
            <a href="page-payment-transfer.html" class="card card-style ms-0" style="height:180px">
                <div class="card-center" style="background-image: url('https://scontent.fdkr5-1.fna.fbcdn.net/v/t1.6435-9/81219833_113733136799880_5796634991081291776_n.jpg?_nc_cat=110&ccb=1-5&_nc_sid=973b4a&_nc_ohc=LmS5wMLx3QYAX-29sPy&_nc_ht=scontent.fdkr5-1.fna&oh=ecc003860e889e47d872d4568d989756&oe=615ED597'); background-position: center; background-size: cover; height:100%">

                </div>

            </a>
        </div>

    </div>


</div>
@endsection
