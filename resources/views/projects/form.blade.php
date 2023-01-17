<div class="mb-3">
    <label for="title">عنوان المشروع</label>
    {{-- $project is passes by compact('project') in projectcontroller to create() and edit() so it is passed automaticly to this form bec i used include  --}}
    <input type="text" class="form-control" name="title" id="title" value="{{ $project->title }}">
</div>

<div class="mb-3">
    <label for="description">وصف المشروع</label>
    <textarea id="description" class="form-control" name="description">{{ $project->description }}</textarea>
</div>
