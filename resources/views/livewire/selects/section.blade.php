<div class="w-100 p-0">
    <x-inputs.group class="col-sm-12 col-lg-8">
        <x-inputs.select
            name="section_id"
            label="Section"
            wire:model="selectedSectionId"
        >
            <option selected>Please select the Section</option>
            @foreach($allSections as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
    @if(!empty($selectedSectionId))
    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="section_id"
            label="Section"
            wire:model="selectedSectionId"
        >
            <option selected>Please select the Section</option>
            @foreach($allSections as $id => $name)
            <option value="{{ $id }}">{{ $name }}</option>
            @endforeach
        </x-inputs.select> </x-inputs.group
    >@endif
</div>
