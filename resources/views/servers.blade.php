@extends('layouts.dashboard')

@section('content')
    <div class="board">


        {{-- BOARD ROW START --}}
        <div class="board-row" id="row-1">


            {{-- SMALL Card --}}
            <div class="cserver-- move cserver--small" draggable="true">
                <div class="small--top" style="position: relative">
                    <div class="cserver--user d-flex justify-content-center align-items-center">
                        <img src="{{asset('pfp-2.jpg')}}" class="user-img me-2" alt="" draggable="false">
                    </div>
                    <a class="cserver--btn" href="http://">Tech</a>
                    <img src="{{asset('th3.png')}}" class="cserver--img" alt="" draggable="false">
                    <small class="cserver--date">2024, Jan. 09</small>
                </div>
                <div class="small--bottom d-flex flex-column  justify-content-around">
                    <p class="small--text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisic ing elit.
                    </p>
                    <div class="d-flex" style="width: 100%; font-size: 13px;">
                        <i class="fa-solid fa-star me-1" style="color: rgb(255, 217, 0); margin-top:-2.5px;"></i>
                        5
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-circle" style="font-size: 4px;"></i>
                        </div>
                        <div class="d-flex align-items-center me-auto">
                            <i class="fa-solid fa-eye me-1 ms-1"></i> 634 views
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-comment me-1 ms-1"></i>13
                        </div>
                    </div>
                </div>
            </div>

            {{-- MEDIUM Card --}}
            <div class="cserver-- move cserver--medium" draggable="true">
                <div class="medium--top" style="position: relative">
                    <div class="cserver--user d-flex justify-content-center align-items-center">
                        <img src="{{asset('pfp-2.jpg')}}" class="user-img me-2" alt="" draggable="false">
                        <span>Your Name</span>
                    </div>
                    <a class="cserver--btn" href="http://">Tech</a>
                    <img src="{{asset('th3.png')}}" class="cserver--img" alt="" draggable="false">
                    <small class="cserver--date">2024, Jan. 09</small>
                </div>
                <div class="medium--bottom d-flex flex-column  justify-content-around">
                    <p class="medium--text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisic ing elit.
                    </p>
                    <div class="d-flex" style="width: 100%; font-size: 13px;">
                        <div class="d-flex align-items-center pe-1">
                            <i class="fa-solid fa-star me-1" style="color: rgb(255, 217, 0); margin-top:-2.5px;"></i>
                            5
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-circle" style="font-size: 4px;"></i>
                        </div>
                        <div class="d-flex align-items-center me-auto">
                            <i class="fa-solid fa-eye me-1 ms-1"></i> 634 views
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-comment me-1 ms-1"></i>13
                        </div>
                    </div>
                </div>
            </div>

            {{-- SMALL Card --}}
            <div class="cserver-- move cserver--small" draggable="true">
                <div class="small--top" style="position: relative">
                    <div class="cserver--user d-flex justify-content-center align-items-center">
                        <img src="{{asset('pfp-2.jpg')}}" class="user-img me-2" alt="" draggable="false">
                    </div>
                    <a class="cserver--btn" href="http://">Tech</a>
                    <img src="{{asset('th3.png')}}" class="cserver--img" alt="" draggable="false">
                    <small class="cserver--date">2024, Jan. 09</small>
                </div>
                <div class="small--bottom d-flex flex-column  justify-content-around">
                    <p class="small--text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisic ing elit.
                    </p>
                    <div class="d-flex" style="width: 100%; font-size: 13px;">
                        <div class="d-flex align-items-center pe-1">
                            <i class="fa-solid fa-star me-1" style="color: rgb(255, 217, 0); margin-top:-2.5px;"></i>
                            5
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-circle" style="font-size: 4px;"></i>
                        </div>
                        <div class="d-flex align-items-center me-auto">
                            <i class="fa-solid fa-eye me-1 ms-1"></i> 634 views
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-comment me-1 ms-1"></i>13
                        </div>
                    </div>
                </div>
            </div>

            {{-- MEDIUM Card --}}
            <div class="cserver-- move cserver--medium" draggable="true">
                <div class="medium--top" style="position: relative">
                    <div class="cserver--user d-flex justify-content-center align-items-center">
                        <img src="{{asset('pfp-2.jpg')}}" class="user-img me-2" alt="" draggable="false">
                        <span>Your Name</span>
                    </div>
                    <a class="cserver--btn" href="http://">Tech</a>
                    <img src="{{asset('th3.png')}}" class="cserver--img" alt="" draggable="false">
                    <small class="cserver--date">2024, Jan. 09</small>
                </div>
                <div class="medium--bottom d-flex flex-column  justify-content-around">
                    <p class="medium--text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisic ing elit.
                    </p>
                    <div class="d-flex" style="width: 100%; font-size: 13px;">
                        <div class="d-flex align-items-center pe-1">
                            <i class="fa-solid fa-star me-1" style="color: rgb(255, 217, 0); margin-top:-2.5px;"></i>
                            5
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-circle" style="font-size: 4px;"></i>
                        </div>
                        <div class="d-flex align-items-center me-auto">
                            <i class="fa-solid fa-eye me-1 ms-1"></i> 634 views
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-comment me-1 ms-1"></i>13
                        </div>
                    </div>
                </div>
            </div>

            <div class="move"></div>


        </div>

        {{-- BOARD ROW START --}}
        <div class="board-row" id="row-2">



            {{-- BIG Card --}}
            <div class="cserver-- move cserver--big" draggable="true">
                <div class="d-flex bg-holder justify-content-between">
                    <div class="big--left d-flex flex-column justify-content-around me-2">
                        <div class="d-flex align-items-center mb-2">
                            <img src="{{asset('pfp-2.jpg')}}" class="user-img me-2" alt="" draggable="false">
                            <span>Your Name</span>
                        </div>
                        <p class="big--text me-auto">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisic ing elit.
                        </p>
                        <div class="d-flex" style="width: 100%; font-size: 13px;">
                            <div class="d-flex align-items-center pe-1">
                                <i class="fa-solid fa-star me-1" style="color: rgb(255, 217, 0); margin-top:-2.5px;"></i>
                                5
                            </div>
                            <div class="d-flex align-items-center pe-1 ps-1">
                                <i class="fa-solid fa-circle" style="font-size: 4px;"></i>
                            </div>
                            <div class="d-flex align-items-center me-auto">
                                <i class="fa-solid fa-eye me-1 ms-1"></i> 634 views
                            </div>
                            <div class="d-flex align-items-center pe-1 ps-1">
                                <i class="fa-solid fa-comment me-1 ms-1"></i>13
                            </div>
                        </div>
                    </div>
                    <div class="big--right">
                     
                        <a class="cserver--btn" href="http://">Tech</a>
                        <img src="{{asset('th3.png')}}" class="cserver--img rounded" alt=""
                            draggable="false">
                        <small class="cserver--date" style="top: 10px; left: 10px;">2024, Jan. 09</small>
                    </div>
                </div>
            </div>





            {{-- SMALL Card --}}
            <div class="cserver-- move cserver--small" draggable="true">
                <div class="small--top" style="position: relative">
                    <div class="cserver--user d-flex justify-content-center align-items-center">
                        <img src="{{asset('pfp-2.jpg')}}" class="user-img me-2" alt="" draggable="false">
                    </div>
                    <a class="cserver--btn" href="http://">Tech</a>
                    <img src="{{asset('th3.png')}}" class="cserver--img" alt="" draggable="false">
                    <small class="cserver--date">2024, Jan. 09</small>
                </div>
                <div class="small--bottom d-flex flex-column  justify-content-around">
                    <p class="small--text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisic ing elit.
                    </p>
                    <div class="d-flex" style="width: 100%; font-size: 13px;">
                        <div class="d-flex align-items-center pe-1">
                            <i class="fa-solid fa-star me-1" style="color: rgb(255, 217, 0); margin-top:-2.5px;"></i>
                            5
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-circle" style="font-size: 4px;"></i>
                        </div>
                        <div class="d-flex align-items-center me-auto">
                            <i class="fa-solid fa-eye me-1 ms-1"></i> 634 views
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-comment me-1 ms-1"></i>13
                        </div>
                    </div>
                </div>
            </div>

            {{-- MEDIUM Card --}}
            <div class="cserver-- move cserver--medium" draggable="true">
                <div class="medium--top" style="position: relative">
                    <div class="cserver--user d-flex justify-content-center align-items-center">
                        <img src="{{asset('pfp-2.jpg')}}" class="user-img me-2" alt="" draggable="false">
                        <span>Your Name</span>
                    </div>
                    <a class="cserver--btn" href="http://">Tech</a>
                    <img src="{{asset('th3.png')}}" class="cserver--img" alt="" draggable="false">
                    <small class="cserver--date">2024, Jan. 09</small>
                </div>
                <div class="medium--bottom d-flex flex-column  justify-content-around">
                    <p class="medium--text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisic ing elit.
                    </p>
                    <div class="d-flex" style="width: 100%; font-size: 13px;">
                        <div class="d-flex align-items-center pe-1">
                            <i class="fa-solid fa-star me-1" style="color: rgb(255, 217, 0); margin-top:-2.5px;"></i>
                            5
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-circle" style="font-size: 4px;"></i>
                        </div>
                        <div class="d-flex align-items-center me-auto">
                            <i class="fa-solid fa-eye me-1 ms-1"></i> 634 views
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-comment me-1 ms-1"></i>13
                        </div>
                    </div>
                </div>
            </div>

            <div class="move"></div>


        </div>

        {{-- BOARD ROW START --}}
        <div class="board-row" id="row-3">


            {{-- SMALL Card --}}
            <div class="cserver-- move cserver--small" draggable="true">
                <div class="small--top" style="position: relative">
                    <div class="cserver--user d-flex justify-content-center align-items-center">
                        <img src="{{asset('pfp-2.jpg')}}" class="user-img me-2" alt="" draggable="false">
                    </div>
                    <a class="cserver--btn" href="http://">Tech</a>
                    <img src="{{asset('th3.png')}}" class="cserver--img" alt="" draggable="false">
                    <small class="cserver--date">2024, Jan. 09</small>
                </div>
                <div class="small--bottom d-flex flex-column  justify-content-around">
                    <p class="small--text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisic ing elit.
                    </p>
                    <div class="d-flex" style="width: 100%; font-size: 13px;">
                        <div class="d-flex align-items-center pe-1">
                            <i class="fa-solid fa-star me-1" style="color: rgb(255, 217, 0); margin-top:-2.5px;"></i>
                            5
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-circle" style="font-size: 4px;"></i>
                        </div>
                        <div class="d-flex align-items-center me-auto">
                            <i class="fa-solid fa-eye me-1 ms-1"></i> 634 views
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-comment me-1 ms-1"></i>13
                        </div>
                    </div>
                </div>
            </div>

            {{-- MEDIUM Card --}}
            <div class="cserver-- move cserver--medium" draggable="true">
                <div class="medium--top" style="position: relative">
                    <div class="cserver--user d-flex justify-content-center align-items-center">
                        <img src="{{asset('pfp-2.jpg')}}" class="user-img me-2" alt="" draggable="false">
                        <span>Your Name</span>
                    </div>
                    <a class="cserver--btn" href="http://">Tech</a>
                    <img src="{{asset('th3.png')}}" class="cserver--img" alt="" draggable="false">
                    <small class="cserver--date">2024, Jan. 09</small>
                </div>
                <div class="medium--bottom d-flex flex-column  justify-content-around">
                    <p class="medium--text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisic ing elit.
                    </p>
                    <div class="d-flex" style="width: 100%; font-size: 13px;">
                        <div class="d-flex align-items-center pe-1">
                            <i class="fa-solid fa-star me-1" style="color: rgb(255, 217, 0); margin-top:-2.5px;"></i>
                            5
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-circle" style="font-size: 4px;"></i>
                        </div>
                        <div class="d-flex align-items-center me-auto">
                            <i class="fa-solid fa-eye me-1 ms-1"></i> 634 views
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-comment me-1 ms-1"></i>13
                        </div>
                    </div>
                </div>
            </div>

            {{-- SMALL Card --}}
            <div class="cserver-- move cserver--small" draggable="true">
                <div class="small--top" style="position: relative">
                    <div class="cserver--user d-flex justify-content-center align-items-center">
                        <img src="{{asset('pfp-2.jpg')}}" class="user-img me-2" alt="" draggable="false">
                    </div>
                    <a class="cserver--btn" href="http://">Tech</a>
                    <img src="{{asset('th3.png')}}" class="cserver--img" alt="" draggable="false">
                    <small class="cserver--date">2024, Jan. 09</small>
                </div>
                <div class="small--bottom d-flex flex-column  justify-content-around">
                    <p class="small--text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisic ing elit.
                    </p>
                    <div class="d-flex" style="width: 100%; font-size: 13px;">
                        <div class="d-flex align-items-center pe-1">
                            <i class="fa-solid fa-star me-1" style="color: rgb(255, 217, 0); margin-top:-2.5px;"></i>
                            5
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-circle" style="font-size: 4px;"></i>
                        </div>
                        <div class="d-flex align-items-center me-auto">
                            <i class="fa-solid fa-eye me-1 ms-1"></i> 634 views
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-comment me-1 ms-1"></i>13
                        </div>
                    </div>
                </div>
            </div>

            {{-- MEDIUM Card --}}
            <div class="cserver-- move cserver--medium" draggable="true">
                <div class="medium--top" style="position: relative">
                    <div class="cserver--user d-flex justify-content-center align-items-center">
                        <img src="{{asset('pfp-2.jpg')}}" class="user-img me-2" alt="" draggable="false">
                        <span>Your Name</span>
                    </div>
                    <a class="cserver--btn" href="http://">Tech</a>
                    <img src="{{asset('pfp-2.jpg')}}" class="cserver--img" alt="" draggable="false">
                    <small class="cserver--date">2024, Jan. 09</small>
                </div>
                <div class="medium--bottom d-flex flex-column  justify-content-around">
                    <p class="medium--text">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. amet consectetur adipisic ing elit.
                    </p>
                    <div class="d-flex" style="width: 100%; font-size: 13px;">
                        <div class="d-flex align-items-center pe-1">
                            <i class="fa-solid fa-star me-1" style="color: rgb(255, 217, 0); margin-top:-2.5px;"></i>
                            5
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-circle" style="font-size: 4px;"></i>
                        </div>
                        <div class="d-flex align-items-center me-auto">
                            <i class="fa-solid fa-eye me-1 ms-1"></i> 634 views
                        </div>
                        <div class="d-flex align-items-center pe-1 ps-1">
                            <i class="fa-solid fa-comment me-1 ms-1"></i>13
                        </div>
                    </div>
                </div>
            </div>
            <div class="move"></div>

        </div>


        {{-- board end div --}}
    </div>
    <script>
        const sortableLists = document.getElementsByClassName('board-row');
        for (sortableList of sortableLists) {
            const items = sortableList.querySelectorAll(".move");

            items.forEach(item => {
                item.addEventListener("dragstart", () => {
                    // Adding dragging class to item after a delay
                    setTimeout(() => item.classList.add("dragging"), 0);
                });
                // Removing dragging class from item on dragend event
                item.addEventListener("dragend", () => item.classList.remove("dragging"));
            });

            const initSortableList = (e) => {
                e.preventDefault();
                const draggingItem = document.querySelector(".dragging");
                // Getting all items except currently dragging and making array of them
                let siblings = [...document.querySelectorAll(".move:not(.dragging)")];

                // Finding the sibling after which the dragging item should be placed
                let nextSibling = siblings.find(sibling => {
                    const xCondition = e.clientX <= sibling.offsetLeft + sibling.offsetWidth / 1.5;
                    const yCondition = e.clientY <= sibling.offsetTop + sibling.offsetHeight / 1.5;

                    return xCondition && yCondition;
                });

                console.log(draggingItem.nextElementSibling);
                if (nextSibling != null && draggingItem.nextElementSibling != null) {

                    let parent = nextSibling.parentElement;


                    if (parent != draggingItem.parentElement) {

                        console.log("INSIDEEEEEEEE");

                        let draggedSibling = draggingItem.nextElementSibling;
                        let draggedParent = draggingItem.parentElement;
                        let temp = nextSibling;
                        parent.insertBefore(draggingItem, nextSibling);
                        parent.removeChild(nextSibling);

                        draggedParent.insertBefore(temp, draggedSibling);


                    } else {
                        parent.insertBefore(draggingItem, nextSibling);
                    }
                }
            }
            sortableList.addEventListener("dragover", initSortableList);
            sortableList.addEventListener("dragenter", e => e.preventDefault());
        };
    </script>
@endsection
