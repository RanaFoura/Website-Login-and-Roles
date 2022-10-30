<div>
    
<div>
    {{$usertype}}
    <br/>
    {{-- <input type="text" wire:model="showDiv"/> --}}

    
    <div class="form-check">
        <input class="form-check-input" type="radio" name="usertype" value="0" wire:model="usertype" wire:click="openDiv" checked>
        <label class="form-check-label" for="flexRadioDefault1">
          Volunteer
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="usertype" wire:model="usertype" wire:click="openDiv" value="1">
        <label class="form-check-label" for="flexRadioDefault1">
          Organization
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="usertype" wire:model="usertype" wire:click="openDiv" value="2">
        <label class="form-check-label" for="flexRadioDefault2">
          Universirty
        </label>
      </div>

      @if ($showDiv==0)
      <div> This is Student </div>
      @endif
      
      @if ($showDiv==1)
      <div> This is Organization</div>
      @endif
      
      @if ($showDiv==2)
      <div> This id University </div>
      @endif




    </div>
</div>







