@php $editing = isset($book) @endphp

<x-inputs.group class="col-sm-12 col-lg-4">
    <x-inputs.text
        name="title"
        label="Title"
        :value="old('title', ($editing ? $book->title : ''))"
        maxlength="255"
        placeholder="Title"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12 col-lg-4">
    <x-inputs.text
        name="author"
        label="Author"
        :value="old('author', ($editing ? $book->author : ''))"
        maxlength="255"
        placeholder="Author"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12 col-lg-4">
    <x-inputs.date
        name="published_at"
        label="Published At"
        value="{{ old('published_at', ($editing ? optional($book->published_at)->format('Y-m-d') : '')) }}"
        max="255"
        required
    ></x-inputs.date>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.text
        name="publication_place"
        label="Publication Place"
        :value="old('publication_place', ($editing ? $book->publication_place : ''))"
        maxlength="255"
        placeholder="Publication Place"
        required
    ></x-inputs.text>
</x-inputs.group>

<x-inputs.group class="col-sm-12">
    <x-inputs.select name="section_id" label="Section" required>
        @php $selected = old('section_id', ($editing ? $book->section_id : '')) @endphp
        <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Section</option>
        @foreach($sections as $value => $label)
        <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
        @endforeach
    </x-inputs.select>
</x-inputs.group>
