<x-layouts.wrapper>
    <div class="w-full flex p-8 flex-col gap-8">


        <div class="title text-3xl text-center font-bold capitalize text-indigo-600">
            what do you want to discover ?
        </div>

        <div class="w-full flex flex-wrap justify-around items-center">

            <div class="h-40 my-4 min-w-[350px] max-w-[500px] bg-white rounded-md shadow-md flex flex-col p-4">

                <div class="header flex justify-between items-center">
                    <div class="flex text-indingo-600 items-center gap-2">

                        <i class="bi bi-journal-richtext m-0 text-2xl"></i>
                        <h1 class="text-lg m-0 font-semibold uppercase tracking-wide">
                            articles
                        </h1>
    
                    </div>

                    <a href="{{ route('articles.index') }}" class="text-sky-400 hover:text-sky-600 anim-300 uppercase">
                        discover
                    </a>
                </div>

                <div class="flex justify-between">

                    <div class="text px-4 lg:px-6">
                        <p class="text-slate-600 drop-shadow text-sm font-semibold">
                            Discover different Articles from doctors over the platform
                            and take your studies to next level, these articles are done on Top
                            of many analytics that our doctor receive every day with the help of <span class="font-bold text-sky-700">AISHA</span>
                        </p>
                    </div>
                </div>

            </div>

            <div class="h-40 my-4 min-w-[350px] max-w-[500px] bg-white rounded-md shadow-md flex flex-col p-4">

                <div class="header flex justify-between items-center">
                    <div class="flex text-indingo-600 items-center gap-2">

                        <i class="bi m-0 bi-people text-2xl"></i>
                        <h1 class="text-lg m-0 font-semibold uppercase tracking-wide">
                            Doctors
                        </h1>
    
                    </div>

                    <a href="{{ route('doctors.index') }}" class="text-sky-400 hover:text-sky-600 anim-300 uppercase">
                        discover
                    </a>
                </div>

                <div class="flex justify-between">

                    <div class="text px-4 lg:px-6">
                        <p class="text-slate-600 drop-shadow text-sm font-semibold">
                            Discover our doctors, our doctors have the experience of exploring
                            patients data and analyse them on top of our Visualization System the powered By AI
                            provided by  <span class="font-bold text-sky-700">AISHA</span>
                        </p>
                    </div>
                </div>

            </div>


            <div class="h-40 my-4 min-w-[350px] max-w-[500px] bg-white rounded-md shadow-md flex flex-col p-4">

                <div class="header flex justify-between items-center">
                    <div class="flex text-indingo-600 items-center gap-2">

                        <i class="bi m-0 bi-chat-square-heart text-2xl"></i>
                        <h1 class="text-lg m-0 font-semibold uppercase tracking-wide">
                            Blog
                        </h1>
    
                    </div>

                    <a href="{{ route('blog.index') }}" class="text-sky-400 hover:text-sky-600 anim-300 uppercase">
                        discover
                    </a>
                </div>

                <div class="flex justify-between">

                    <div class="text px-4 lg:px-6">
                        <p class="text-slate-600 drop-shadow text-sm font-semibold">
                            If you are a person who don't need the articles, just you are curios about 
                            healthcare and data analytics, you can discover our blog, the blog contains spme of 
                            doctors posts, Videos and stories from community of <span class="font-bold text-sky-700">AISHA</span>
                        </p>
                    </div>
                </div>

            </div>

            <div class="h-40 my-4 min-w-[350px] max-w-[500px] bg-white rounded-md shadow-md flex flex-col p-4">

                <div class="header flex justify-between items-center">
                    <div class="flex text-indingo-600 items-center gap-2">

                        <i class="bi m-0 bi-collection-play text-2xl"></i>
                        <h1 class="text-lg m-0 font-semibold uppercase tracking-wide">
                            Learn
                        </h1>
    
                    </div>

                    <a href="{{ route('learn.index') }}" class="text-sky-400 hover:text-sky-600 anim-300 uppercase">
                        discover
                    </a>
                </div>

                <div class="flex justify-between">

                    <div class="text px-4 lg:px-6">
                        <p class="text-slate-600 drop-shadow text-sm font-semibold">
                            you can learn from our doctors, our doctors provide some amazing courses
                            about healthcare and Medicine in general, not just doctors, but our company 
                            provide courses that teach you the world of Data these and many more from <span class="font-bold text-sky-700">AISHA</span>
                        </p>
                    </div>
                </div>

            </div>


        </div>

    </div>
</x-layouts.wrapper>