@php $editing = isset($department) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="name"
        label="Name"
        :value="old('name', ($editing ? $department->name : ''))"
        maxlength="255"
        placeholder="Name"
        required
    ></x-inputs.text>
</x-inputs.group>
