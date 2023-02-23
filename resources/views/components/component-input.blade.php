<div class="mr-2 mb-3">
    <div>
        <label for="{{$name}}" class="block text-sm font-medium text-gray-700">{{$label}}</label>
        <div class="relative mt-1 rounded-md shadow-sm">

          <input type="{{$type}}"
          wire:model="{{$name}}" id="{{$name}}" class="block w-full rounded-md border-gray-300 pl-1 pr-12
           focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" placeholder="{{$placeholder}}">
        </div>
        @if($errors->has($name))
        <small class="text-red-600">{{$errors->first($name)}}</small>
        @endif
      </div>
</div>
