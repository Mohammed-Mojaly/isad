<style>
    .autocomplete {position: relative;display: inline-block;}.autocomplete-items {position: absolute;border: 1px solid #d4d4d4;border-bottom: none;border-top: none;z-index: 99;width: 30%;}@media  screen and (max-width: 992px) {    .autocomplete-items {        width: 88% !important;    }    }.autocomplete-items div {padding: 10px;cursor: pointer;background-color: #fff;border-bottom: 1px solid #d4d4d4;}.autocomplete-items div:hover {background-color: #e9e9e9;}.autocomplete-active {background-color: DodgerBlue !important;color: #ffffff;}
</style>
<x-guest-layout>

    <x-jet-authentication-card>
        <x-slot name="logo">
            <div class=" bg-white mt-5 p-3 rounded-md text-2xl font-bold">
                <h3>Beneficiary Registration</h3>
            </div>
            {{-- <x-jet-authentication-card-logo /> --}}
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" class="mb-10">
            @csrf

            <div>
                <x-jet-label for="name" value="Fullname" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="id_number" value="Identity number" />
                <x-jet-input id="id_number" class="block mt-1 w-full" type="number" name="id_number" maxlength="10" minlength="10" :value="old('id_number')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="phone" value="Mobile number" />
                <x-jet-input id="phone" class="block mt-1 w-full" type="text" name="phone" maxlength="15" minlength="6" :value="old('id_number')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="city-live" value="City Live" />
                <x-jet-input id="city-live" class="block mt-1 w-full" type="text" name="city_live"  :value="old('city_live')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="marital_status" value="Marital Status" />
                <x-jet-input id="myInput" class="block mt-1 w-full" type="text" name="marital_status"  :value="old('marital_status')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>


            <div class="mt-4 flex">
                <x-jet-input id="accept" class="block" type="checkbox" name="accept_policy" required  />
                <x-jet-label for="accept" class="block ml-2" value="I read and agree to Privacy Policy." />
            </div>




            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>


<script>
    function autocomplete(inp, arr) {
      var currentFocus;
      inp.addEventListener("input", function(e) {
          var a, b, i, val = this.value;
          closeAllLists();
          if (!val) { return false;}
          currentFocus = -1;
          a = document.createElement("DIV");
          a.setAttribute("id", this.id + "autocomplete-list");
          a.setAttribute("class", "autocomplete-items");
          this.parentNode.appendChild(a);
          for (i = 0; i < arr.length; i++) {
            if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
              b = document.createElement("DIV");
              b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
              b.innerHTML += arr[i].substr(val.length);
              b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
              b.addEventListener("click", function(e) {
                  inp.value = this.getElementsByTagName("input")[0].value;

                  closeAllLists();
              });
              a.appendChild(b);
            }
          }
      });

      inp.addEventListener("keydown", function(e) {
          var x = document.getElementById(this.id + "autocomplete-list");
          if (x) x = x.getElementsByTagName("div");
          if (e.keyCode == 40) {

            currentFocus++;
            addActive(x);
          } else if (e.keyCode == 38) {

            currentFocus--;
            addActive(x);
          } else if (e.keyCode == 13) {
            e.preventDefault();
            if (currentFocus > -1) {
              if (x) x[currentFocus].click();
            }
          }
      });
      function addActive(x) {
        if (!x) return false;
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        x[currentFocus].classList.add("autocomplete-active");
      }
      function removeActive(x) {
        for (var i = 0; i < x.length; i++) {
          x[i].classList.remove("autocomplete-active");
        }
      }
      function closeAllLists(elmnt) {

        var x = document.getElementsByClassName("autocomplete-items");
        for (var i = 0; i < x.length; i++) {
          if (elmnt != x[i] && elmnt != inp) {
            x[i].parentNode.removeChild(x[i]);
          }
        }
      }
      document.addEventListener("click", function (e) {
          closeAllLists(e.target);
      });
    }

    var statuss = ["Widow", "Divorced", "Deserted married", "Disabled husband"];
    var cities = ["Mecca","Medina","Ad Dammām","Al Hufūf","Buraydah","Al Ḩillah","Aţ Ţā’if","Tabūk","Khamīs Mushayţ","Ḩā’il","Al Qaţīf","Al Mubarraz","Al Kharj","Najrān","Yanbu‘","Abhā","Arar","Jāzān","Sakākā","Al Bāḩah"];

    autocomplete(document.getElementById("myInput"), statuss);
    autocomplete(document.getElementById("city-live"), cities);

</script>
