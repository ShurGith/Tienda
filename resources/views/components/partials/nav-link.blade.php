@props(['active' => false])
<a
  class="{{ $active?'bg-gray-900 border-b rounded-none rounded-t-md': '' }} text-white font-medium px-4 py-2 rounded-md text-sm hover:text-slate-100 transition duration-300 hover:bg-gray-500"
  {{ $attributes }}>{{$slot}}</a>