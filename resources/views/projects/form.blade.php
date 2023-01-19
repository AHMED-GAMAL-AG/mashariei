<div class="mb-3">
    <label for="title">عنوان المشروع</label>
    {{-- $project is passes by compact('project') in projectcontroller to create() and edit() so it is passed automaticly to this form bec i used include  --}}
    <input type="text" class="form-control" name="title" id="title" value="{{ $project->title }}">
    @error('title')
        <div class="text-danger">
            <small>{{ $message }}</small>
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="description">وصف المشروع</label>
    <textarea id="description" class="form-control" name="description">{{ $project->description }}</textarea>
    @error('description')
        <div class="text-danger">
            <small>{{ $message }}</small>
        </div>
    @enderror
</div>
