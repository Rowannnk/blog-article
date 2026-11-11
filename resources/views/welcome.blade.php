
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Blog</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen bg-gray-100 text-gray-900">

    <header class="border-b border-gray-200 bg-white">
        <div class="mx-auto max-w-4xl px-6 py-5">
            <h1 class="text-2xl font-bold text-gray-900">
                My Blog
            </h1>
            <p class="mt-1 text-sm text-gray-500">
                Stories, ideas and thoughts.
            </p>
        </div>
    </header>

    <main class="mx-auto max-w-4xl px-6 py-10">

        @if ($post)
            <article class="rounded-2xl border border-gray-200 bg-white p-8 shadow-sm">

                <div class="mb-5">
                    <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-700">
                        Latest Post
                    </span>
                </div>

                <h2 class="text-3xl font-bold leading-tight tracking-tight text-gray-900">
                    {{ $post->title }}
                </h2>

                <div class="mt-4 flex flex-wrap items-center gap-2 text-sm text-gray-500">
                    <span class="font-medium text-gray-700">
                        {{ $post->author->name }}
                    </span>

                    <span>•</span>

                    <span>
                        {{ $post->created_at->format('F d, Y') }}
                    </span>
                </div>

                <div class="my-7 border-t border-gray-100"></div>

                <div class="whitespace-pre-line text-base leading-8 text-gray-700">
                    {{ $post->content }}
                </div>

            </article>
        @else
            <div class="rounded-2xl border border-gray-200 bg-white p-12 text-center shadow-sm">
                <h2 class="text-xl font-semibold text-gray-900">
                    No posts available
                </h2>

                <p class="mt-2 text-gray-500">
                    Check back later for new posts.
                </p>
            </div>
        @endif

    </main>

</body>
</html>
```