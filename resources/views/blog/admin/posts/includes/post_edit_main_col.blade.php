<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                @if ($item->is_published)
                     Опубликовано
                @else
                    Черновик
                @endif
            </div>
            <div class="card-body">
                <div class="card-title"></div>
                <div class="card-subtitle mb-2 text-muted"></div>
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a href="#maindata" role="tab" data-toggle="tab" class="nav-link active">
                            Основные данные
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#adddata" role="tab" data-toggle="tab" class="nav-link">
                            Доп данные
                        </a>
                    </li>
                </ul>
                <br>
                <div class="tab-content">
                    <div class="tab-pane active" id="maindata" role="tabpanel">
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input type="text"
                                   id="title"
                                   name="title"
                                   class="form-control"
                                   minlength="3"
                                   value="{{ $item->title }}"
                                   required
                            >
                        </div>
                        <div class="form-group">
                            <label for="content_raw">Статья</label>
                            <textarea name="content_raw"
                                      id="content_raw"
                                      class="form-control"
                                      rows="10"
                            >{{ old('content_raw', $item->content_raw) }}</textarea>
                        </div>
                    </div>
                    <div class="tab-pane" id="adddata" role="tabpanel">
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select name="category_id"
                                    id="category_id"
                                    class="form-control"
                                    placeholder="Выберете категорию"
                                    required
                            >
                                @foreach ($categoryList as $categoryOption)
                                    <option value="{{ $categoryOption->id }}"
                                    @if ($categoryOption->id == $item->category_id)
                                        selected
                                    @endif>
                                        {{ $categoryOption->id_title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="slug">Идентификатор</label>
                            <input type="text"
                                   name="slug"
                                   id="slug"
                                   value="{{ $item->slug }}"
                                   class="form-control"
                            >
                        </div>

                        <div class="form-group">
                            <label for="excerpt">Выдержка</label>
                            <textarea name="excerpt"
                                      id="excerpt"
                                      class="form-control"
                                      rows="3"
                            >{{ old('excerpt', $item->excerpt) }}</textarea>
                        </div>

                        <div class="form-check">
                            <input name="is_published"
                                   type="hidden"
                                   value="0">
                            <input type="checkbox"
                                   name="is_published"
                                   class="form-check-input"
                                   id="is_published"
                                   value="1"
                                   @if ($item->is_published) checked="checked" @endif
                            >
                            <label for="is_published" class="form-check-label">Опубликовано</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>