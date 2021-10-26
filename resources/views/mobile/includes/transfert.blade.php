<div class="menu-size" style="height:440px;">
    <div class="d-flex mx-3 mt-3 py-1">
        <div class="align-self-center">
            <h1 class="mb-0">Effectuer un envoi</h1>
        </div>
        <div class="align-self-center ms-auto">
            <a href="#" class= ps-4 shadow-0 me-n2" data-bs-dismiss="offcanvas">
                <i class="bi bi-x color-red-dark font-26 line-height-xl"></i>
            </a>
        </div>
    </div>
    <div class="divider divider-margins mt-3"></div>
    <div class="content mt-0">
        {{-- <div class="form-custom form-label form-icon">
            <i class="bi bi-wallet2 font-14"></i>
            <select class="form-select rounded-xs" id="c6" aria-label="Floating label select example">
                <option selected>Main Account</option>
                <option value="1">Savings Account</option>
                <option value="2">Company Account</option>
            </select>
            <label for="c6" class="form-label-always-active color-highlight font-11">Choose Account</label>
        </div> --}}
        <div class="form-custom form-label form-icon">
            <i class="bi bi-code-square font-14"></i>
            <input type="number" class="form-control rounded-xs" id="c3" placeholder="Numéro de telephone bénéficier" />
            <label for="c3" class="form-label-always-active color-highlight font-11">Numéro  de telephone</label>
            <span class="font-10">(obligatoire)</span>
        </div>
        <div class="pb-3"></div>
        <div class="form-custom form-label form-icon">
            <i class="bi bi-code-square font-14"></i>
            <input type="number" class="form-control rounded-xs" id="c3" placeholder="montant que vous souhaitez envoyer" />
            <label for="c3" class="form-label-always-active color-highlight font-11">Montant à transféré</label>
            <span class="font-10">(obligatoire)</span>
        </div>
        <div class="pb-3"></div>
        <div class="form-custom form-label form-icon">
            <i class="bi bi-code-square font-14"></i>
            <input type="number" class="form-control rounded-xs" id="c4" placeholder="reçu"/>
            <label for="c4" class="form-label-always-active color-highlight font-11">Montant reçu</label>
            <span class="font-10">( les frais sont inclus )</span>
        </div>


    </div>
    <a href="#" data-bs-dismiss="offcanvas" class="mx-3 mb-3 btn btn-full gradient-green shadow-bg shadow-bg-s">Valider l'envoi</a>
</div>
