<div class="container">
    <section class="text-center background">
            <h1>Nirvana</h1>
            <p class="lead text">Загрузите чек и почувствуйте в розыгрыше призов от</p>
            <div>
                <h2 class="text-danger font-weight-bold">DUKE </h2>
            </div>
                <label for="1" class="btn btn-primary">
                    Загрузить Чек
                <input id="1" type="file" wire:model="image" class="d-none">
                @error('image') <span class="error">{{ $message }}</span> @enderror

                </label>
    </section>

    <table class="table">
        <thead class="thead bg-info">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Имя</th>
            <th scope="col">Фото Чека</th>
            <th scope="col">Тип Чека</th>
            <th scope="col">Дата</th>
            <th scope="col">Код</th>
            <th scope="col">Участие</th>
            <th scope="col">Статус</th>
        </tr>
        </thead>
        <tbody>
      @foreach ($checks as $item)
          <tr class="@if ($item->status ==1 && $item->created_at->format("y,m,w") !=date("y,m,w"))
              bg-success
              @elseif ($item->created_at->format("y,m,w") !=date("y,m,w"))
                  bg-danger
          @endif">
              <th scope="row">{{ ($checks ->currentpage()-1) * $checks ->perpage() + $loop->index + 1 }}</th>

                  <td>{{$item->userRelationship[0]->name}}</td>
              <td><img src="/storage/{{$item->image}}" class="img-fluid rounded" alt=""></td>
                  <td>{{$item->type}}</td>
              <td>{{$item->created_at->format('y.m.d')}}</td>
              @if (isset($item->code))
                  <td>{{$item->code}}</td>
              @else
                  <td></td>
              @endif
              @if ($item->created_at->format("y,m,w") !=date("y,m,w"))
                  <td>Не участвует на этой неделе</td>
              @else
                  <td></td>
              @endif
              @if ($item->status ==1)
                  <td>Принят</td>
                  @else
                  <td>Отклонен</td>
              @endif

          </tr>
      @endforeach

        </tbody>
    </table>
    <div class="py-4">
        {{$checks->links("pagination::bootstrap-4")}}
    </div>
</div>
