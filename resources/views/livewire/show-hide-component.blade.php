
<div>
{{$showDiv}}
<br/>
{{-- <input type="text" wire:model="showDiv"/> --}}


<div class="form-check">
    <input class="form-check-input" type="radio" name="usertype" id="stuvol" value="1" wire:model="showDiv" checked>
    <label class="form-check-label" for="flexRadioDefault1">
      Volunteer
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="usertype" id="org"  wire:model="showDiv" value="2">
    <label class="form-check-label" for="flexRadioDefault1">
      Organization
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="usertype" id="uni" wire:model="showDiv" value="3">
    <label class="form-check-label" for="flexRadioDefault2">
      Universirty
    </label>
  </div>
</div>