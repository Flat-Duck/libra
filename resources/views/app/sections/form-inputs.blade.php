@php $editing = isset($section) @endphp

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="name"
        label="Name"
        :value="old('name', ($editing ? $section->name : ''))"
        maxlength="255"
        placeholder="Name"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.select name="department_id" label="Department" required>
        @php $selected = old('department_id', ($editing ? $section->department_id : '')) @endphp
        <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Department</option>
        @foreach($departments as $value => $label)
        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
        @endforeach
    </x-inputs.select>
</x-inputs.group>
