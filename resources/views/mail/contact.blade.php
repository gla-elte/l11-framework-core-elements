<x-mail::message>
# Introduction

The body of your message.

<x-mail::button :url="'http://attila.gludovatz.hu/blog'">
Contact me
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
