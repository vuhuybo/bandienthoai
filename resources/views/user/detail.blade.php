@extends('layout.main')
@section('main')
<style>
    /* Style the color rectangle container */
.color-rectangle {
  display: inline-block;
  position: relative;
  margin: 5px;
  width: 90px; /* Điều chỉnh kích thước của hình chữ nhật */
  height: 50px;
  /* border: 2px solid #aaa; Viền mặc định */
  border-radius: 4px; /* Góc bo viền */
}

/* Hide the radio button */
.color-rectangle input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Style the label as the text */
.color-rectangle label {
  display: block;
  width: 100%;
  height: 100%;
  text-align: center;
  line-height: 45px; /* Căn giữa văn bản theo chiều cao của hình chữ nhật */
  color: #333; /* Màu chữ */
  font-weight: bold;
  font-size: 16px;
  border: 3px solid gray;
  border-radius: 4px;

}

/* Style the border when radio button is checked */
.color-rectangle input:checked + label {
  color: #333; /* Màu chữ khi được chọn */
  border: 3px solid red;
  border-radius: 4px;/* Màu viền khi được chọn */
}

.product-variant{
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
}

button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;

  }

  #numberInput {
    width: 60px;
    text-align: center;
    margin: 0 10px;
  }

 </style>

    <!-- Sart Single Product -->
    <section class="gi-single-product py-[40px] max-[767px]:py-[30px] relative bg-[#fff] transition-all duration-[0.5s] ease">
        <div class="flex flex-wrap justify-between items-center mx-auto min-[1600px]:max-w-[1600px] min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="w-full flex flex-row px-[12px]">
                <div class="gi-pro-rightside gi-common-rightside w-full">
                    <!-- Single product content Start -->
                    <div class="single-pro-block">
                        <div class="single-pro-inner">
                            <div class="w-full flex flex-wrap">
                                <div class="single-pro-img single-pro-img-no-sidebar w-[40%] relative pr-[12px] max-[991px]:w-full max-[991px]:max-w-[500px] max-[991px]:m-auto max-[991px]:px-[12px] max-[420px]:px-[0]">
                                    <div class="single-product-scroll p-[15px] sticky top-[30px] rounded-[5px] border-[1px] border-solid border-[#eee]">
                                        <div class="single-product-cover overflow-hidden cursor-zoom-in rounded-[5px]">
                                            <div class="single-slide zoom-image-hover">
                                                <img id="mainImage" class="img-responsive h-full w-full" src="{{ asset('uploads/product/'.$product->image) }}"  alt="">
                                            </div>
                                            <div class="single-slide zoom-image-hover">
                                                <img  class="img-responsive h-full w-full" src="{{ asset('uploads/product/'.$product->image) }}" alt="">
                                            </div>
                                        </div>
                                        <div class="single-nav-thumb w-full overflow-hidden">

                                            @foreach ($product ->variant as $item)
                                                <div class="single-slide px-[11px] pt-[11px]">
                                                    <img class="img-responsive h-full w-full border-[1px] border-solid border-transparent transition-all duration-[0.3s] ease delay-[0s] cursor-pointer rounded-[5px]" src="{{ asset('uploads/product/'.$item ->image) }}" alt="">
                                                </div>


                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                                <div class="single-pro-desc single-pro-desc-no-sidebar w-[60%] pl-[12px] max-[991px]:pl-[0] max-[991px]:mt-[30px] max-[991px]:w-full">
                                    <div class="single-pro-content">
                                        <h5 class="gi-single-title text-[#4b5966] text-[22px] capitalize mb-[20px] block font-Poppins font-medium leading-[35px] tracking-[0.02rem] max-[1199px]:text-[20px] max-[1199px]:leading-[33px] max-[767px]:text-[18px] max-[767px]:text-[18px] max-[767px]:leading-[31px]">{{ $product->name_product}}</h5>
                                        <div class="gi-single-rating-wrap flex mb-[14px] items-center">
                                            <div class="gi-single-rating pr-[15px] leading-[17px]">
                                                <i class="gicon gi-star fill text-[#f27d0c] float-left text-[14px] mr-[3px]"></i>
                                                <i class="gicon gi-star fill text-[#f27d0c] float-left text-[14px] mr-[3px]"></i>
                                                <i class="gicon gi-star fill text-[#f27d0c] float-left text-[14px] mr-[3px]"></i>
                                                <i class="gicon gi-star fill text-[#f27d0c] float-left text-[14px] mr-[3px]"></i>
                                                <i class="gicon gi-star-o text-[#b2b2b2] float-left text-[14px] mr-[3px]"></i>
                                            </div>
                                            <span class="gi-read-review text-[#999] leading-[17px]">
                                                |&nbsp;&nbsp;<a href="#gi-spt-nav-review" class="text-[#999] text-[14px] leading-[20px] hover:text-[#5caf90]">992 Ratings</a>
                                            </span>
                                        </div>
                                        <div class="gi-single-price-stoke mb-[15px] pt-[15px] pb-[15px] flex justify-between">
                                            <div class="gi-single-price flex flex-col">
                                                <div class="final-price mb-[15px] text-[#4b5966] font-semibold text-[22px] leading-[32px] font-Poppins tracking-[0] max-[1199px]:text-[20px]">{{number_format($product->price,0,',','.')}} vnđ
                                                </div>
                                                {{-- <div class="mrp text-[#777]">M.R.P. : <span class="text-[#999] line-through">$2,999.00</span></div> --}}
                                            </div>
                                            {{-- <div class="gi-single-stoke flex flex-col">
                                                <span class="gi-single-sku mb-[15px] text-[18px] leading-[32px] text-[#4b5966] font-semibold tracking-[0.02rem]">SKU#: WH12</span>
                                                <span class="gi-single-ps-title leading-[1] text-[16px] text-[#5caf90] tracking-[0]">IN STOCK</span>
                                            </div> --}}
                                        </div>
                                        <div class="gi-single-desc mb-[12px] text-[#777] text-[14px] tracking-[0] break-all leading-[26px] font-Poppins">
                                            {{$product->describe}}
                                        </div>
                                        {{-- <div class="gi-single-list">
                                            <ul class="mb-[30px] pl-[18px]">
                                                <li class="my-[10px] text-[#777] text-[14px] list-circle"><strong class="font-semibold">Closure :</strong> Hook & Loop</li>
                                                <li class="my-[10px] text-[#777] text-[14px] list-circle"><strong class="font-semibold">Sole :</strong> Polyvinyl Chloride</li>
                                                <li class="my-[10px] text-[#777] text-[14px] list-circle"><strong class="font-semibold">Width :</strong> Medium</li>
                                                <li class="my-[10px] text-[#777] text-[14px] list-circle"><strong class="font-semibold">Outer Material :</strong> A-Grade Standard Quality</li>
                                            </ul>
                                        </div> --}}
                                        <div class="gi-pro-variation mb-[20px] pb-[5px]">
                                            <div class="gi-pro-variation-inner gi-pro-variation-size text-[16px] font-semibold text-[#4b5966] flex-col mb-[15px] flex">
                                                <span class="mb-[10px] text-[#202020] font-medium text-[15px] leading-[1.1] tracking-[0.04rem] uppercase font-Poppins block">Color</span>
                                                <div class="gi-pro-variation-content">
                                                        <div class="product-variant">
                                                        @foreach ($product->variant as $key =>$item)

                                                        <div class="color-rectangle">
                                                            <input type="radio" name="color-option" id="color-{{$key}}" data-variant="{{$item->id}}" data-color="{{$item->color}}" data-quantity="{{$item->quantity}}" data-image="{{$item->image}}">
                                                            <label for="color-{{$key}}">{{$item->color}}</label>
                                                          </div>

                                                        @endforeach
                                                        </div>
                                                </div>
                                                <div id="stocks"></div>
                                            </div>
                                        </div>
                                        <div class="gi-single-qty flex flex-wrap w-full m-[-5px]">

                                                <button id="decrementButton">-</button>
                                                <input type="number" id="numberInput" value="1" min="1" readonly>
                                                <button id="incrementButton">+</button>
                                                <input type="hidden" id="name" value="{{$product->name_product}}">
                                                <input type="hidden" id="price" value="{{$product->price}}">
                                                <input type="hidden" id="user_id" value="2">
                                                <input type="hidden" id="idProduct" value="{{$product->id}}">
                                                <input type="hidden" id="dataColor">
                                                <input type="hidden" id="dataQuantity" value="1">
                                                <input type="hidden" id="dataImage">
                                                <input type="hidden" id="variant">
                                            <div class="gi-single-cart">
                                                <button type="button" id="addtoCart" class="btn btn-primary gi-btn-1 flex h-[40px] leading-[50px] text-center text-[14px] m-[5px] py-[10px] px-[15px] uppercase justify-center bg-[#4b5966] text-[#fff] transition-all duration-[0.3s] ease-in-out relative rounded-[5px] items-center min-w-[160px] font-semibold tracking-[0.02rem] border-[0] hover:bg-[#5caf90] hover:text-[#fff]">Add To Cart</button>
                                            </div>

                                            <div class="gi-single-wishlist m-[5px]">
                                                <a class="gi-btn-group wishlist w-[40px] h-[40px] flex items-center justify-center transition-all duration-[0.3s] ease delay-[0s] text-[#17181c] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px] hover:text-[#fff] hover:bg-[#5caf90] hover:border-[#5caf90]" title="Wishlist">
                                                    <i class="fi-rr-heart transition-all duration-[0.3s] ease-in-out text-[#4b5966] leading-[0]"></i>
                                                </a>
                                            </div>
                                            <div class="gi-single-quickview m-[5px]">
                                                <a href="javascript:void(0)" class="gi-btn-group quickview w-[40px] h-[40px] flex items-center justify-center transition-all duration-[0.3s] ease delay-[0s] text-[#17181c] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px] hover:text-[#fff] hover:bg-[#5caf90] hover:border-[#5caf90] modal-toggle">
                                                    <i class="fi-rr-eye transition-all duration-[0.3s] ease-in-out text-[#4b5966] leading-[0]"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single product content End -->
                    <!-- Add More and get discount content Start -->

                    <!-- Single product accordion start -->
                    <div class=" mt-5 gi-accordion style-1 gi-single-pro-tab-content overflow-hidden bg-[#fff] text-left p-[30px] border-[1px] border-solid border-[#eee] text-[#202020] text-[18px] tracking-[0] leading-[1.6] rounded-[5px]">
                        <div class="gi-accordion-item border-[#eee] overflow-hidden mb-[10px]">
                            <h4 class="gi-accordion-header m-[0] py-[15px] pl-[15px] pr-[35px] bg-[#f8f8fb] text-[#4b5966] text-[16px] leading-[28px] font-medium relative font-Poppins border-[1px] border-solid border-[#eee] rounded-[5px] tracking-[0.01rem] max-[767px]:text-[15px]">
                                Product Detail
                            </h4>
                            <div class="gi-accordion-body show py-[15px] text-[14px] text-[#777] leading-[24px] hidden">
                                <div class="gi-single-pro-tab-desc">
                                    <p class="mb-[15px] text-[14px] tracking-[0] text-[#777] leading-[28px] font-normal">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to
                                        make a type specimen book. It has survived not only five centuries, but also
                                        the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    <ul class="mb-[15px] pl-[24px] ">
                                        <li class="text-[15px] mb-[4px] text-[#777] tracking-[0.02rem] list-disc">Any Product types that You want - Simple, Configurable</li>
                                        <li class="text-[15px] mb-[4px] text-[#777] tracking-[0.02rem] list-disc">Downloadable/Digital Products, Virtual Products</li>
                                        <li class="text-[15px] mb-[4px] text-[#777] tracking-[0.02rem] list-disc">Inventory Management with Backordered items</li>
                                        <li class="text-[15px] mb-[4px] text-[#777] tracking-[0.02rem] list-disc">Flatlock seams throughout.</li>
                                    </ul>
                                    <p class="mb-[15px] text-[14px] tracking-[0] text-[#777] leading-[28px] font-normal">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to
                                        make a type specimen book. It has survived not only five centuries, but also
                                        the leap into electronic typesetting, remaining essentially unchanged.
                                    </p>
                                    <p class="text-[14px] tracking-[0] text-[#777] leading-[28px] font-normal">There are many variations of passages of Lorem Ipsum available, but the majority
                                        have
                                        suffered alteration in some form, by injected humour, or randomised words which
                                        don't
                                        look even slightly believable. If you are going to use a passage of Lorem Ipsum,
                                        you need to be sure there isn't anything embarrassing hidden in the middle of
                                        text.
                                        All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks
                                        as necessary,
                                        making this the first true generator on the Internet. It uses a dictionary of
                                        over
                                        200 Latin words, combined with a handful of model sentence structures, to
                                        generate
                                        Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore
                                        always
                                        free from repetition, injected humour, or non-characteristic words etc.</p>
                                </div>
                            </div>
                        </div>
                        <div class="gi-accordion-item border-[#eee] overflow-hidden mb-[10px]">
                            <h4 class="gi-accordion-header m-[0] py-[15px] pl-[15px] pr-[35px] bg-[#f8f8fb] text-[#4b5966] text-[16px] leading-[28px] font-medium relative font-Poppins border-[1px] border-solid border-[#eee] rounded-[5px] tracking-[0.01rem] max-[767px]:text-[15px]">
                                Specifications
                            </h4>
                            <div class="gi-accordion-body py-[15px] text-[14px] text-[#777] leading-[24px] hidden">
                                <div class="gi-single-pro-tab-moreinfo">
                                    <p class="text-[#777] font-Poppins text-[14px] font-normal leading-[28px] tracking-[0.02rem] mb-[16px]">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text ever since the
                                        1500s, when an unknown printer took a galley of type and scrambled it to
                                        make a type specimen book. It has survived not only five centuries.
                                    </p>
                                    <ul class="pl-[24px]">
                                        <li class="mb-[4px] text-[15px] text-[#777] tracking-[0.02rem] list-disc max-[575px]:mb-[10px]"><span class="mr-[25px] min-w-[150px] text-[15px] text-[#4b5966] inline-block font-medium max-[575px]:w-full">Model</span> SKU140</li>
                                        <li class="mb-[4px] text-[15px] text-[#777] tracking-[0.02rem] list-disc max-[575px]:mb-[10px]"><span class="mr-[25px] min-w-[150px] text-[15px] text-[#4b5966] inline-block font-medium max-[575px]:w-full">Weight</span> 500 g</li>
                                        <li class="mb-[4px] text-[15px] text-[#777] tracking-[0.02rem] list-disc max-[575px]:mb-[10px]"><span class="mr-[25px] min-w-[150px] text-[15px] text-[#4b5966] inline-block font-medium max-[575px]:w-full">Dimensions</span> 35 × 30 × 7 cm</li>
                                        <li class="mb-[4px] text-[15px] text-[#777] tracking-[0.02rem] list-disc max-[575px]:mb-[10px]"><span class="mr-[25px] min-w-[150px] text-[15px] text-[#4b5966] inline-block font-medium max-[575px]:w-full">Color</span> Black, Pink, Red, White</li>
                                        <li class="mb-[4px] text-[15px] text-[#777] tracking-[0.02rem] list-disc max-[575px]:mb-[10px]"><span class="mr-[25px] min-w-[150px] text-[15px] text-[#4b5966] inline-block font-medium max-[575px]:w-full">Size</span> 10 X 20</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="gi-accordion-item border-[#eee] overflow-hidden mb-[10px]">
                            <h4 class="gi-accordion-header m-[0] py-[15px] pl-[15px] pr-[35px] bg-[#f8f8fb] text-[#4b5966] text-[16px] leading-[28px] font-medium relative font-Poppins border-[1px] border-solid border-[#eee] rounded-[5px] tracking-[0.01rem] max-[767px]:text-[15px]">
                                Vendor
                            </h4>
                            <div class="gi-accordion-body py-[15px] text-[14px] text-[#777] leading-[24px] hidden">
                                <div class="gi-single-pro-tab-moreinfo">
                                    <div class="gi-product-vendor">
                                        <div class="gi-vendor-info mb-[15px] flex flex-row">
                                            <span>
                                                <img src="{{ asset('assets1/img/vendor/3.jpg"  ') }}" alt="vendor" class="w-[80px] mr-[15px] border-[1px] border-solid border-[#eee]">
                                            </span>
                                            <div>
                                                <h5 class="text-[15px] font-semibold text-[#4b5966] tracking-[0.01rem] mb-[6px] leading-[1.2]">Ocean Crate</h5>
                                                <p class="text-[#777] font-Poppins text-[14px] font-normal leading-[28px] tracking-[0.02rem]">Products : 358</p>
                                                <p class="text-[#777] font-Poppins text-[14px] font-normal leading-[28px] tracking-[0.02rem]">Sales : 5587</p>
                                            </div>
                                        </div>
                                        <div class="gi-detail">
                                            <ul class="mb-[15px] pl-[24px] ">
                                                <li class="mb-[4px] text-[15px] text-[#777] tracking-[0.02rem] list-disc leading-[24px] max-[575px]:mb-[10px]"><span class="mr-[25px] min-w-[150px] text-[15px] text-[#4b5966] inline-block font-medium tracking-[0.02rem] max-[575px]:w-full">Phone No. :</span> +00 987654321</li>
                                                <li class="mb-[4px] text-[15px] text-[#777] tracking-[0.02rem] list-disc leading-[24px] max-[575px]:mb-[10px]"><span class="mr-[25px] min-w-[150px] text-[15px] text-[#4b5966] inline-block font-medium tracking-[0.02rem] max-[575px]:w-full">Email. :</span> Example@gmail.com</li>
                                                <li class="mb-[4px] text-[15px] text-[#777] tracking-[0.02rem] list-disc leading-[24px] max-[575px]:mb-[10px]"><span class="mr-[25px] min-w-[150px] text-[15px] text-[#4b5966] inline-block font-medium tracking-[0.02rem] max-[575px]:w-full">Address. :</span> 2548 Broaddus Maple Court, Madisonville KY 4783, USA.</li>
                                            </ul>
                                            <p class="text-[#777] font-Poppins text-[14px] font-normal leading-[28px] tracking-[0.02rem] mb-[16px]">Lorem Ipsum is simply dummy text of the printing and typesetting
                                                industry.
                                                Lorem Ipsum has been the industry's standard dummy text ever since the
                                                1500s, when an unknown printer took a galley of type and scrambled it to
                                                make a type specimen book. It has survived not only five centuries, but
                                                also
                                                the leap into electronic typesetting, remaining essentially unchanged.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="gi-accordion-item border-[#eee] overflow-hidden">
                            <h4 class="gi-accordion-header m-[0] py-[15px] pl-[15px] pr-[35px] bg-[#f8f8fb] text-[#4b5966] text-[16px] leading-[28px] font-medium relative font-Poppins border-[1px] border-solid border-[#eee] rounded-[5px] tracking-[0.01rem] max-[767px]:text-[15px]">
                                Reviews
                            </h4>
                            <div class="gi-accordion-body pt-[15px] text-[14px] text-[#777] leading-[24px] hidden">
                                <div id="gi-spt-nav-review" class="a-tab-pane">
                                    <div class="row flex flex-wrap w-full">
                                        <div class="gi-t-review-wrapper mt-[10px]">
                                            <div class="gi-t-review-item flex mb-[25px] pb-[25px] border-b-[1px] border-solid border-[#eee]">
                                                <div class="gi-t-review-avtar basis-[50px] shrink-[0] grow-[0] mr-[15px]">
                                                    <img src="{{ asset('assets1/img/user/1.jpg" alt="user" ') }}" class="max-w-full rounded-[5px]">
                                                </div>
                                                <div class="gi-t-review-content">
                                                    <div class="gi-t-review-top flex flex-col mb-[10px]">
                                                        <div class="gi-t-review-name text-[15px] m-[0] leading-[1.5] font-medium block text-[#4b5966]">Moris Willson</div>
                                                        <div class="gi-t-review-rating text-[16px] mt-[5px]">
                                                            <i class="gicon gi-star fill inline-block text-[#f27d0c] float-left text-[13px] mr-[3px]"></i>
                                                            <i class="gicon gi-star fill inline-block text-[#f27d0c] float-left text-[13px] mr-[3px]"></i>
                                                            <i class="gicon gi-star fill inline-block text-[#f27d0c] float-left text-[13px] mr-[3px]"></i>
                                                            <i class="gicon gi-star fill inline-block text-[#f27d0c] float-left text-[13px] mr-[3px]"></i>
                                                            <i class="gicon gi-star-o inline-block text-[#b2b2b2] float-left text-[14px] mr-[3px]"></i>
                                                        </div>
                                                    </div>
                                                    <div class="gi-t-review-bottom">
                                                        <p class="w-full m-[0] text-[14px] text-[#777] leading-[24px] font-normal">
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard dummy text ever since the 1500s, when an unknown
                                                            printer took a galley of type and scrambled it to make a
                                                            type specimen.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="gi-t-review-item flex mb-[25px] pb-[25px] border-b-[1px] border-solid border-[#eee]">
                                                <div class="gi-t-review-avtar basis-[50px] shrink-[0] grow-[0] mr-[15px]">
                                                    <img src="{{ asset('assets1/img/user/2.jpg" alt="user" ') }}" class="max-w-full rounded-[5px]">
                                                </div>
                                                <div class="gi-t-review-content">
                                                    <div class="gi-t-review-top flex flex-col mb-[10px]">
                                                        <div class="gi-t-review-name text-[15px] m-[0] leading-[1.5] font-medium block text-[#4b5966]">Moris Willson</div>
                                                        <div class="gi-t-review-rating text-[16px] mt-[5px]">
                                                            <i class="gicon gi-star fill inline-block text-[#f27d0c] float-left text-[13px] mr-[3px]"></i>
                                                            <i class="gicon gi-star fill inline-block text-[#f27d0c] float-left text-[13px] mr-[3px]"></i>
                                                            <i class="gicon gi-star fill inline-block text-[#f27d0c] float-left text-[13px] mr-[3px]"></i>
                                                            <i class="gicon gi-star-o inline-block text-[#b2b2b2] float-left text-[14px] mr-[3px]"></i>
                                                            <i class="gicon gi-star-o inline-block text-[#b2b2b2] float-left text-[14px] mr-[3px]"></i>
                                                        </div>
                                                    </div>
                                                    <div class="gi-t-review-bottom">
                                                        <p class="w-full m-[0] text-[14px] text-[#777] leading-[24px] font-normal">Lorem Ipsum has been the industry's
                                                            standard dummy text ever since the 1500s, when an unknown
                                                            printer took a galley of type and scrambled it to make a
                                                            type specimen.
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gi-ratting-content w-full">
                                            <h3 class="mb-[10px] text-[20px] font-semibold leading-[1] font-Poppins text-[#4b5966] tracking-[0.01rem]">Add a Review</h3>
                                            <div class="gi-ratting-form">
                                                <form action="#" class="w-full">
                                                    <div class="gi-ratting-star flex mt-[5px] mb-[25px] items-center">
                                                        <span class="mr-[18px] text-[16px] text-[#777] tracking-[0.02rem]">Your rating:</span>
                                                        <div class="gi-t-review-rating">
                                                            <i class="gicon gi-star fill inline-block text-[18px] text-[#f27d0c] float-left mr-[3px]"></i>
                                                            <i class="gicon gi-star fill inline-block text-[18px] text-[#f27d0c] float-left mr-[3px]"></i>
                                                            <i class="gicon gi-star-o inline-block text-[18px] text-[#b2b2b2] float-left mr-[3px]"></i>
                                                            <i class="gicon gi-star-o inline-block text-[18px] text-[#b2b2b2] float-left mr-[3px]"></i>
                                                            <i class="gicon gi-star-o inline-block text-[18px] text-[#b2b2b2] float-left mr-[3px]"></i>
                                                        </div>
                                                    </div>
                                                    <div class="gi-ratting-input mb-[10px]">
                                                        <input name="your-name" placeholder="Name" type="text" class="text-[14px] rounded-[5px] w-full  h-[50px] mb-[15px] py-[5px] px-[20px] outline-[0] border-[1px] border-solid border-[#eee] text-[#777]">
                                                    </div>
                                                    <div class="gi-ratting-input mb-[10px]">
                                                        <input name="your-email" placeholder="Email*" type="email" class="text-[14px] rounded-[5px] w-full  h-[50px] mb-[15px] py-[5px] px-[20px] outline-[0] border-[1px] border-solid border-[#eee] text-[#777]" required>
                                                    </div>
                                                    <div class="gi-ratting-input form-submit">
                                                        <textarea name="your-commemt" placeholder="Enter Your Comment" class="bg-transparent border-[1px] border-solid border-[#eee] text-[#4b5966] h-[150px] p-[20px] mb-[15px] w-full outline-[0] text-[14px] rounded-[5px]"></textarea>
                                                        <button type="submit" class="gi-btn-2 transition-all duration-[0.3s] ease-in-out py-[10px] px-[15px] text-[14px] font-medium bg-[#5caf90] text-[#fff] text-center rounded-[5px] hover:bg-[#4b5966] hover:text-[#fff]" value="Submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details description area end -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Single Product -->

    <!-- Related product section -->
    <section class="gi-related-product gi-new-product py-[40px] max-[767px]:py-[30px]">
        <div class="flex flex-wrap justify-between items-center mx-auto min-[1600px]:max-w-[1600px] min-[1400px]:max-w-[1320px] min-[1200px]:max-w-[1140px] min-[992px]:max-w-[960px] min-[768px]:max-w-[720px] min-[576px]:max-w-[540px]">
            <div class="flex flex-wrap overflow-hidden">
                <div class="gi-new-prod-section w-full px-[12px]">
                    <div class="gi-products">
                        <div class="section-title-2 w-full mb-[20px] pb-[20px] flex flex-col justify-center items-center" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="200">
                            <h2 class="gi-title mb-[0] font-manrope text-[26px] font-semibold text-[#4b5966] relative inline p-[0] capitalize leading-[1]">Related <span class="text-[#5caf90]">Products</span></h2>
                            <p class="max-w-[400px] mt-[15px] text-[14px] text-[#777] text-center leading-[23px]">Browse The Collection of Top Products</p>
                        </div>
                        <div class="gi-new-block mx-[-12px]" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="300">
                            <div class="new-product-carousel owl-carousel gi-product-slider">
                                <div class="gi-product-content h-full px-[12px] flex max-[575px]:w-full max-[575px]:m-auto">
                                    <div class="gi-product-inner transition-all duration-[0.3s] ease-in-out cursor-pointer flex flex-col overflow-hidden border-[1px] border-solid border-[#eee] rounded-[5px]">
                                        <div class="gi-pro-image-outer transition-all duration-[0.3s] delay-[0s] ease z-[11] relative">
                                            <div class="gi-pro-image overflow-hidden">
                                                <a href="product-left-sidebar.html" class="image relative block overflow-hidden pointer-events-none">
                                                    <span class="label veg max-[991px]:hidden">
                                                        <span class="dot"></span>
                                                    </span>
                                                    <img class="main-image max-w-full transition-all duration-[0.3s] ease delay-[0s]" src="{{ asset('assets1/img/product-images/6_1.jpg ') }}" alt="Product">
                                                    <img class="hover-image absolute z-[1] top-[0] left-[0] opacity-[0] transition-all duration-[0.3s] ease delay-[0s]" src="{{ asset('assets1/img/product-images/6_2.jpg ') }}" alt="Product">
                                                </a>
                                                <span class="flags flex flex-col p-[0] uppercase absolute top-[10px] right-[10px] z-[2]">
                                                    <span class="sale px-[10px] py-[5px] text-[11px] font-medium leading-[12px] text-left uppercase flex items-center bg-[#ff7070] text-[#fff] tracking-[0.5px] relative rounded-[5px]">Sale</span>
                                                </span>
                                                <div class="gi-pro-actions transition-all duration-[0.3s] ease-in-out absolute z-[9] left-[0] right-[0] bottom-[-10px] max-[991px]:opacity-[1] max-[991px]:bottom-[10px] flex flex-row items-center justify-center my-[0] mx-auto opacity-0">
                                                    <a class="gi-btn-group wishlist transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Wishlist">
                                                        <i class="fi-rr-heart transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group quickview transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px] modal-toggle">
                                                        <i class="fi-rr-eye transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group compare transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Compare">
                                                        <i class="fi fi-rr-arrows-repeat transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]">
                                                        <i class="fi-rr-shopping-basket transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gi-pro-content h-full p-[20px] relative z-[10] flex flex-col text-left border-t-[1px] border-solid border-[#eee]">
                                            <a href="shop-left-sidebar-col-3.html">
                                                <h6 class="gi-pro-stitle mb-[10px] font-normal text-[#999] text-[13px] leading-[1.2] capitalize">Dried Fruits</h6>
                                            </a>
                                            <h5 class="gi-pro-title h-full mb-[10px] text-[16px]">
                                                <a href="product-left-sidebar.html" class="block text-[14px] leading-[22px] font-normal text-[#4b5966] tracking-[0.85px] capitalize font-Poppins hover:text-[#5caf90]">Mixed Nuts Seeds & Berries Pack</a>
                                            </h5>
                                            <div class="gi-pro-rat-price mt-[5px] mb-[0] flex flex-col">
                                                <span class="gi-pro-rating mb-[10px] opacity-[0.7] relative">
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                </span>
                                                <span class="gi-price">
                                                    <span class="new-price text-[#4b5966] font-bold text-[14px] mr-[7px]">$45.00</span>
                                                    <span class="old-price text-[14px] text-[#777] line-through">$56.00</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gi-product-content h-full px-[12px] flex max-[575px]:w-full max-[575px]:m-auto">
                                    <div class="gi-product-inner transition-all duration-[0.3s] ease-in-out cursor-pointer flex flex-col overflow-hidden border-[1px] border-solid border-[#eee] rounded-[5px]">
                                        <div class="gi-pro-image-outer transition-all duration-[0.3s] delay-[0s] ease z-[11] relative">
                                            <div class="gi-pro-image overflow-hidden">
                                                <a href="product-left-sidebar.html" class="image relative block overflow-hidden pointer-events-none">
                                                    <img class="main-image max-w-full transition-all duration-[0.3s] ease delay-[0s]" src="{{ asset('assets1/img/product-images/3_1.jpg ') }}" alt="Product">
                                                    <img class="hover-image absolute z-[1] top-[0] left-[0] opacity-[0] transition-all duration-[0.3s] ease delay-[0s]" src="{{ asset('assets1/img/product-images/3_1.jpg ') }}" alt="Product">
                                                </a>
                                                <span class="flags flex flex-col p-[0] uppercase absolute top-[10px] right-[10px] z-[2]">
                                                    <span class="sale px-[10px] py-[5px] text-[11px] font-medium leading-[12px] text-left uppercase flex items-center bg-[#ff7070] text-[#fff] tracking-[0.5px] relative rounded-[5px]">Sale</span>
                                                </span>
                                                <div class="gi-pro-actions transition-all duration-[0.3s] ease-in-out absolute z-[9] left-[0] right-[0] bottom-[-10px] max-[991px]:opacity-[1] max-[991px]:bottom-[10px] flex flex-row items-center justify-center my-[0] mx-auto opacity-0">
                                                    <a class="gi-btn-group wishlist transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Wishlist">
                                                        <i class="fi-rr-heart transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group quickview transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px] modal-toggle">
                                                        <i class="fi-rr-eye transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group compare transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Compare">
                                                        <i class="fi fi-rr-arrows-repeat transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]">
                                                        <i class="fi-rr-shopping-basket transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gi-pro-content h-full p-[20px] relative z-[10] flex flex-col text-left border-t-[1px] border-solid border-[#eee]">
                                            <a href="shop-left-sidebar-col-3.html">
                                                <h6 class="gi-pro-stitle mb-[10px] font-normal text-[#999] text-[13px] leading-[1.2] capitalize">Cookies</h6>
                                            </a>
                                            <h5 class="gi-pro-title h-full mb-[10px] text-[16px]">
                                                <a href="product-left-sidebar.html" class="block text-[14px] leading-[22px] font-normal text-[#4b5966] tracking-[0.85px] capitalize font-Poppins hover:text-[#5caf90]">Multi-Grain
                                                    Jaggery Combo Cookies</a></h5>
                                            <div class="gi-pro-rat-price mt-[5px] mb-[0] flex flex-col">
                                                <span class="gi-pro-rating mb-[10px] opacity-[0.7] relative">
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                    <span class="qty absolute bottom-[0] right-[0] text-[#777] text-[13px]">10 kg</span>
                                                </span>
                                                <span class="gi-price">
                                                    <span class="new-price text-[#4b5966] font-bold text-[14px] mr-[7px]">$25.00</span>
                                                    <span class="old-price text-[14px] text-[#777] line-through">$30.00</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gi-product-content h-full px-[12px] flex max-[575px]:w-full max-[575px]:m-auto">
                                    <div class="gi-product-inner transition-all duration-[0.3s] ease-in-out cursor-pointer flex flex-col overflow-hidden border-[1px] border-solid border-[#eee] rounded-[5px]">
                                        <div class="gi-pro-image-outer transition-all duration-[0.3s] delay-[0s] ease z-[11] relative">
                                            <div class="gi-pro-image overflow-hidden">
                                                <a href="product-left-sidebar.html" class="image relative block overflow-hidden pointer-events-none">
                                                    <img class="main-image max-w-full transition-all duration-[0.3s] ease delay-[0s]" src="{{ asset('assets1/img/product-images/9_1.jpg ') }}" alt="Product">
                                                    <img class="hover-image absolute z-[1] top-[0] left-[0] opacity-[0] transition-all duration-[0.3s] ease delay-[0s]" src="{{ asset('assets1/img/product-images/9_2.jpg ') }}" alt="Product">
                                                </a>
                                                <div class="gi-pro-actions transition-all duration-[0.3s] ease-in-out absolute z-[9] left-[0] right-[0] bottom-[-10px] max-[991px]:opacity-[1] max-[991px]:bottom-[10px] flex flex-row items-center justify-center my-[0] mx-auto opacity-0">
                                                    <a class="gi-btn-group wishlist transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Wishlist">
                                                        <i class="fi-rr-heart transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group quickview transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px] modal-toggle">
                                                        <i class="fi-rr-eye transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group compare transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Compare">
                                                        <i class="fi fi-rr-arrows-repeat transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]">
                                                        <i class="fi-rr-shopping-basket transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gi-pro-content h-full p-[20px] relative z-[10] flex flex-col text-left border-t-[1px] border-solid border-[#eee]">
                                            <a href="shop-left-sidebar-col-3.html">
                                                <h6 class="gi-pro-stitle mb-[10px] font-normal text-[#999] text-[13px] leading-[1.2] capitalize">Foods</h6>
                                            </a>
                                            <h5 class="gi-pro-title h-full mb-[10px] text-[16px]">
                                                <a href="product-left-sidebar.html" class="block text-[14px] leading-[22px] font-normal text-[#4b5966] tracking-[0.85px] capitalize font-Poppins hover:text-[#5caf90]">
                                                    Fresh Mango tasty juice 500ml pack</a>
                                            </h5>
                                            <div class="gi-pro-rat-price mt-[5px] mb-[0] flex flex-col">
                                                <span class="gi-pro-rating mb-[10px] opacity-[0.7] relative">
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                </span>
                                                <span class="gi-price">
                                                    <span class="new-price text-[#4b5966] font-bold text-[14px] mr-[7px]">$49.00</span>
                                                    <span class="old-price text-[14px] text-[#777] line-through">$65.00</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gi-product-content h-full px-[12px] flex max-[575px]:w-full max-[575px]:m-auto">
                                    <div class="gi-product-inner transition-all duration-[0.3s] ease-in-out cursor-pointer flex flex-col overflow-hidden border-[1px] border-solid border-[#eee] rounded-[5px]">
                                        <div class="gi-pro-image-outer transition-all duration-[0.3s] delay-[0s] ease z-[11] relative">
                                            <div class="gi-pro-image overflow-hidden">
                                                <a href="product-left-sidebar.html" class="image relative block overflow-hidden pointer-events-none">
                                                    <img class="main-image max-w-full transition-all duration-[0.3s] ease delay-[0s]" src="{{ asset('assets1/img/product-images/2_1.jpg ') }}"
                                                        alt="Product">
                                                    <img class="hover-image absolute z-[1] top-[0] left-[0] opacity-[0] transition-all duration-[0.3s] ease delay-[0s]" src="{{ asset('assets1/img/product-images/2_2.jpg ') }}"
                                                        alt="Product">
                                                </a>
                                                <span class="flags flex flex-col p-[0] uppercase absolute top-[10px] right-[10px] z-[2]">
                                                    <span class="sale px-[10px] py-[5px] text-[11px] font-medium leading-[12px] text-left uppercase flex items-center bg-[#ff7070] text-[#fff] tracking-[0.5px] relative rounded-[5px]">Sale</span>
                                                </span>
                                                <div class="gi-pro-actions transition-all duration-[0.3s] ease-in-out absolute z-[9] left-[0] right-[0] bottom-[-10px] max-[991px]:opacity-[1] max-[991px]:bottom-[10px] flex flex-row items-center justify-center my-[0] mx-auto opacity-0">
                                                    <a class="gi-btn-group wishlist transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Wishlist">
                                                        <i class="fi-rr-heart transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group quickview transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px] modal-toggle">
                                                        <i class="fi-rr-eye transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group compare transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Compare">
                                                        <i class="fi fi-rr-arrows-repeat transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]">
                                                        <i class="fi-rr-shopping-basket transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gi-pro-content h-full p-[20px] relative z-[10] flex flex-col text-left border-t-[1px] border-solid border-[#eee]">
                                            <a href="shop-left-sidebar-col-3.html">
                                                <h6 class="gi-pro-stitle mb-[10px] font-normal text-[#999] text-[13px] leading-[1.2] capitalize">Dried Fruits</h6>
                                            </a>
                                            <h5 class="gi-pro-title h-full mb-[10px] text-[16px]">
                                                <a href="product-left-sidebar.html" class="block text-[14px] leading-[22px] font-normal text-[#4b5966] tracking-[0.85px] capitalize font-Poppins hover:text-[#5caf90]">Dates Value
                                                    Solimo Fresh Pouch</a></h5>
                                            <div class="gi-pro-rat-price mt-[5px] mb-[0] flex flex-col">
                                                <span class="gi-pro-rating mb-[10px] opacity-[0.7] relative">
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                </span>
                                                <span class="gi-price">
                                                    <span class="new-price text-[#4b5966] font-bold text-[14px] mr-[7px]">$78.00</span>
                                                    <span class="old-price text-[14px] text-[#777] line-through">$85.00</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gi-product-content h-full px-[12px] flex max-[575px]:w-full max-[575px]:m-auto">
                                    <div class="gi-product-inner transition-all duration-[0.3s] ease-in-out cursor-pointer flex flex-col overflow-hidden border-[1px] border-solid border-[#eee] rounded-[5px]">
                                        <div class="gi-pro-image-outer transition-all duration-[0.3s] delay-[0s] ease z-[11] relative">
                                            <div class="gi-pro-image overflow-hidden">
                                                <a href="product-left-sidebar.html" class="image relative block overflow-hidden pointer-events-none">
                                                    <img class="main-image max-w-full transition-all duration-[0.3s] ease delay-[0s]" src="{{ asset('assets1/img/product-images/1_1.jpg ') }}"
                                                        alt="Product">
                                                    <img class="hover-image absolute z-[1] top-[0] left-[0] opacity-[0] transition-all duration-[0.3s] ease delay-[0s]" src="{{ asset('assets1/img/product-images/1_2.jpg ') }}"
                                                        alt="Product">
                                                </a>
                                                <span class="flags flex flex-col p-[0] uppercase absolute top-[10px] right-[10px] z-[2]">
                                                    <span class="new sale px-[10px] py-[5px] text-[11px] font-medium leading-[12px] text-left uppercase flex items-center bg-[#5caf90] text-[#fff] tracking-[0.5px] relative rounded-[5px]">New</span>
                                                </span>
                                                <div class="gi-pro-actions transition-all duration-[0.3s] ease-in-out absolute z-[9] left-[0] right-[0] bottom-[-10px] max-[991px]:opacity-[1] max-[991px]:bottom-[10px] flex flex-row items-center justify-center my-[0] mx-auto opacity-0">
                                                    <a class="gi-btn-group wishlist transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Wishlist">
                                                        <i class="fi-rr-heart transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group quickview transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px] modal-toggle">
                                                        <i class="fi-rr-eye transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group compare transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Compare">
                                                        <i class="fi fi-rr-arrows-repeat transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]">
                                                        <i class="fi-rr-shopping-basket transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gi-pro-content h-full p-[20px] relative z-[10] flex flex-col text-left border-t-[1px] border-solid border-[#eee]">
                                            <a href="shop-left-sidebar-col-3.html">
                                                <h6 class="gi-pro-stitle mb-[10px] font-normal text-[#999] text-[13px] leading-[1.2] capitalize">Foods</h6>
                                            </a>
                                            <h5 class="gi-pro-title h-full mb-[10px] text-[16px]">
                                                <a href="product-left-sidebar.html" class="block text-[14px] leading-[22px] font-normal text-[#4b5966] tracking-[0.85px] capitalize font-Poppins hover:text-[#5caf90]">Stick Fiber
                                                    Gluten Free Masala-Magic</a></h5>
                                            <div class="gi-pro-rat-price mt-[5px] mb-[0] flex flex-col">
                                                <span class="gi-pro-rating mb-[10px] opacity-[0.7] relative">
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                    <span class="qty absolute bottom-[0] right-[0] text-[#777] text-[13px]">2 pack</span>
                                                </span>
                                                <span class="gi-price">
                                                    <span class="new-price text-[#4b5966] font-bold text-[14px] mr-[7px]">$45.00</span>
                                                    <span class="old-price text-[14px] text-[#777] line-through">$50.00</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gi-product-content h-full px-[12px] flex max-[575px]:w-full max-[575px]:m-auto">
                                    <div class="gi-product-inner transition-all duration-[0.3s] ease-in-out cursor-pointer flex flex-col overflow-hidden border-[1px] border-solid border-[#eee] rounded-[5px]">
                                        <div class="gi-pro-image-outer transition-all duration-[0.3s] delay-[0s] ease z-[11] relative">
                                            <div class="gi-pro-image overflow-hidden">
                                                <a href="product-left-sidebar.html" class="image relative block overflow-hidden pointer-events-none">
                                                    <img class="main-image max-w-full transition-all duration-[0.3s] ease delay-[0s]" src="{{ asset('assets1/img/product-images/24_1.jp ') }}g"
                                                        alt="Product">
                                                    <img class="hover-image absolute z-[1] top-[0] left-[0] opacity-[0] transition-all duration-[0.3s] ease delay-[0s]" src="{{ asset('assets1/img/product-images/24_1.jp ') }}g"
                                                        alt="Product">
                                                </a>
                                                <span class="flags flex flex-col p-[0] uppercase absolute top-[10px] right-[10px] z-[2]">
                                                    <span class="new sale px-[10px] py-[5px] text-[11px] font-medium leading-[12px] text-left uppercase flex items-center bg-[#5caf90] text-[#fff] tracking-[0.5px] relative rounded-[5px]">New</span>
                                                </span>
                                                <div class="gi-pro-actions transition-all duration-[0.3s] ease-in-out absolute z-[9] left-[0] right-[0] bottom-[-10px] max-[991px]:opacity-[1] max-[991px]:bottom-[10px] flex flex-row items-center justify-center my-[0] mx-auto opacity-0">
                                                    <a class="gi-btn-group wishlist transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Wishlist">
                                                        <i class="fi-rr-heart transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group quickview transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px] modal-toggle">
                                                        <i class="fi-rr-eye transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group compare transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Compare">
                                                        <i class="fi fi-rr-arrows-repeat transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]">
                                                        <i class="fi-rr-shopping-basket transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gi-pro-content h-full p-[20px] relative z-[10] flex flex-col text-left border-t-[1px] border-solid border-[#eee]">
                                            <a href="shop-left-sidebar-col-3.html">
                                                <h6 class="gi-pro-stitle mb-[10px] font-normal text-[#999] text-[13px] leading-[1.2] capitalize">Fresh Fruit</h6>
                                            </a>
                                            <h5 class="gi-pro-title h-full mb-[10px] text-[16px]">
                                                <a href="product-left-sidebar.html" class="block text-[14px] leading-[22px] font-normal text-[#4b5966] tracking-[0.85px] capitalize font-Poppins hover:text-[#5caf90]">Natural Hub Red
                                                    Cherry Karonda</a></h5>
                                            <div class="gi-pro-rat-price mt-[5px] mb-[0] flex flex-col">
                                                <span class="gi-pro-rating mb-[10px] opacity-[0.7] relative">
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                    <span class="qty absolute bottom-[0] right-[0] text-[#777] text-[13px]">1 kg</span>
                                                </span>
                                                <span class="gi-price">
                                                    <span class="new-price text-[#4b5966] font-bold text-[14px] mr-[7px]">$20.00</span>
                                                    <span class="old-price text-[14px] text-[#777] line-through">$21.00</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gi-product-content h-full px-[12px] flex max-[575px]:w-full max-[575px]:m-auto">
                                    <div class="gi-product-inner transition-all duration-[0.3s] ease-in-out cursor-pointer flex flex-col overflow-hidden border-[1px] border-solid border-[#eee] rounded-[5px]">
                                        <div class="gi-pro-image-outer transition-all duration-[0.3s] delay-[0s] ease z-[11] relative">
                                            <div class="gi-pro-image overflow-hidden">
                                                <a href="product-left-sidebar.html" class="image relative block overflow-hidden pointer-events-none">
                                                    <img class="main-image max-w-full transition-all duration-[0.3s] ease delay-[0s]" src="{{ asset('assets1/img/product-images/17_1.jp ') }}g" alt="Product">
                                                    <img class="hover-image absolute z-[1] top-[0] left-[0] opacity-[0] transition-all duration-[0.3s] ease delay-[0s]" src="{{ asset('assets1/img/product-images/17_1.jp ') }}g" alt="Product">
                                                </a>
                                                <div class="gi-pro-actions transition-all duration-[0.3s] ease-in-out absolute z-[9] left-[0] right-[0] bottom-[-10px] max-[991px]:opacity-[1] max-[991px]:bottom-[10px] flex flex-row items-center justify-center my-[0] mx-auto opacity-0">
                                                    <a class="gi-btn-group wishlist transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Wishlist">
                                                        <i class="fi-rr-heart transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group quickview transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px] modal-toggle">
                                                        <i class="fi-rr-eye transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" class="gi-btn-group compare transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]" title="Compare">
                                                        <i class="fi fi-rr-arrows-repeat transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                    <a href="javascript:void(0)" title="Add To Cart" class="gi-btn-group add-to-cart transition-all duration-[0.3s] ease-in-out h-[30px] w-[30px] mx-[2px] flex items-center justify-center text-[#fff] bg-[#fff] border-[1px] border-solid border-[#eee] rounded-[5px]">
                                                        <i class="fi-rr-shopping-basket transition-all duration-[0.3s] ease-in-out text-[#777] leading-[10px]"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gi-pro-content h-full p-[20px] relative z-[10] flex flex-col text-left border-t-[1px] border-solid border-[#eee]">
                                            <a href="shop-left-sidebar-col-3.html">
                                                <h6 class="gi-pro-stitle mb-[10px] font-normal text-[#999] text-[13px] leading-[1.2] capitalize">Tuber root</h6>
                                            </a>
                                            <h5 class="gi-pro-title h-full mb-[10px] text-[16px]">
                                                <a href="product-left-sidebar.html" class="block text-[14px] leading-[22px] font-normal text-[#4b5966] tracking-[0.85px] capitalize font-Poppins hover:text-[#5caf90]">Fresh Organic Ginger Product</a>
                                            </h5>
                                            <div class="gi-pro-rat-price mt-[5px] mb-[0] flex flex-col">
                                                <span class="gi-pro-rating mb-[10px] opacity-[0.7] relative">
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star fill text-[14px] text-[#f27d0c] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                    <i class="gicon gi-star text-[14px] text-[#777] mr-[3px] float-left mr-[3px]"></i>
                                                    <span class="qty absolute bottom-[0] right-[0] text-[#777] text-[13px]">100 g</span>
                                                </span>
                                                <span class="gi-price">
                                                    <span class="new-price text-[#4b5966] font-bold text-[14px] mr-[7px]">$2.00</span>
                                                    <span class="old-price text-[14px] text-[#777] line-through">$3.00</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <!-- Related product section End -->

    <script >

        var max = 1;

        const colorOptions = document.querySelectorAll('input[name="color-option"]');

        for (const input of colorOptions ) {
            console.log(input);

            input.addEventListener('click',function(){
                var quantity = input.dataset.quantity;
                var color = input.dataset.color;
                var image = input.dataset.image;
                var variant = input.dataset.variant;
                document.getElementById('dataColor').value = color;
                document.getElementById('dataImage').value = image;
                   document.getElementById('variant').value = variant;


                max = quantity;
                console.log(quantity);
                let stock = document.querySelector('#stocks');
                    if (stock) {
                        stock.innerText = `Stock : ${quantity} items`; // or any logic you want
                    }
            })

        }
        document.addEventListener("DOMContentLoaded", function() {
            const numberInput = document.getElementById('numberInput');
const incrementButton = document.getElementById('incrementButton');
const decrementButton = document.getElementById('decrementButton');

// Xử lý khi click vào nút tăng (+)
incrementButton.addEventListener('click', function() {
    let value = parseInt(numberInput.value);

    if (max == 0) {
        alert('Bạn chưa chọn màu');
        numberInput.value = 1;
        document.getElementById('dataQuantity').value = 1;

        return false;
    } else if (value == max) {
        alert(`Bạn đã chọn quá số lượng trong kho`);
        document.getElementById('dataQuantity').value = max;

        numberInput.value = max;
        return false;
    } else {
        numberInput.value = value + 1;
        document.getElementById('dataQuantity').value = numberInput.value;

    }
});

      // Xử lý khi click vào nút giảm (-)
      decrementButton.addEventListener('click', function() {
        let currentValue = parseInt(numberInput.value) - 1;
        if (currentValue >= 0) {
          numberInput.value = currentValue.toString();
        }
      });
    });

      </script>

<script type="module">



    $('#addtoCart').click(function(){
    let name = $('#name').val();
    let variant = $('#variant').val();
    let price = $('#price').val();
    let user_id = $('#user_id').val();
    let idProduct = $('#idProduct').val();
    let dataColor = $('#dataColor').val();
    let dataQuantity = $('#dataQuantity').val();
    let dataImage = $('#dataImage').val();
        // console.log(dataImage);
        $.ajax({
            url:'{{route("checkcard")}}',
            method:'GET',
            data:{
                variant
            },
            success:function(data){
                // console.log(data);
                if(data){
                   let total = data.total;
                        let id= data.id;
                        let quantityht = data.quantity;
                        let quantitys = Number(quantityht)+ Number(dataQuantity)

                        // let checkId = data.product_id;
                        let checkVariant = data.id_variant;
                        let checkQuantity = data.quantity;

                        // console.log(checkVariant);

                        $.ajax({
                            url:'{{route("checkCart")}}',
                            method:'GET',
                            data:{

                                checkVariant

                            },
                            success:function(data){
                                // console.log(data);
                                if(data){
                                    let quantityVariant = data.quantity;
                                    let check = Number(dataQuantity) + Number(checkQuantity);
                                    console.log(check);

                                    if(check > quantityVariant){

                                        alert('Sản phẩm trong giỏ hàng không đủ');
                                    }else{
                                        $.ajax({
                                        url:'{{route("updatecard")}}',
                                        method:'GET',
                                        data:{
                                            id,
                                            quantitys,
                                            price
                                        },
                                        success:function(){
                                            alert('Thêm vào giỏ hàng thành công');
                                        }

                        })
                                    }
                                }
                            }

                        })



                }else{
                    $.ajax({

                        url:'{{route("addCart")}}',
                        method:"GET",
                        data:{
                            name,
                            price,
                            user_id,
                            idProduct,
                            dataColor,
                            dataQuantity,
                            dataImage,
                            variant
                        },

                        success:function(){
                            alert('Thêm vào giỏ hàng thành công');
                        }
                        })
                }
            }
        })


    })


</script>
@endsection
