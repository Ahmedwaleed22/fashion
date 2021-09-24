<div class="product-wrapper">

                                <a class="product-inner " href="product/{{ $product->slug }}"
                                   aria-label="1 Day Acuvue Moist (30&nbsp;lenses)">

                                    <div class="hidden product-id">339</div>

                                    <div class="product-name-area">
                                        <h3 class="product-name">
                                            {{  $product->getTranslation('name')  }}
                                        </h3>
                                    </div>

                                    <div class="product-image-area">
                                        <picture>

                                            <img src="{{ uploaded_asset($product->thumbnail_img) }}"
                                                 alt="1 Day Acuvue Moist (30&nbsp;lenses)" class="product-image"
                                                 loading="lazy">
                                        </picture>
                                    </div>

                                    <div class="product-period-area">
                                        <div class="product-change-period">Daily</div>
                                    </div>

                                    <div class="product-benefits-area">
                                        <div class="benefit-icons">


                                        </div>
                                    </div>

                                    <div class="product-benefits-texts-area">


                                        <span class="product-benefit-text">In stock</span>
                                    </div>


                                    <div class="product-stock-area">
                                        <div class="product-stock">
                                            <i></i><span>In stock</span>
                                        </div>
                                    </div>

                                    <div class="product-prices-area">
                                        <div class="product-prices">

                                            <div class="product-price-discount">
                                            </div>

                                            <div class="product-price-actual">
									<span>

										{{ home_discounted_base_price($product) }}
									</span>
                                                <span class="hidden">85.99</span>
                                            </div>

                                            <div class="product-basket">
                                                <button class="ajax product-add-to-basket-button datalayer-product-list-addToBasket-button">
                                                    Add to basket
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-absolutes">


                                    </div>

                                </a>


                                <div class="hidden gtm-data">
                                    <div class="gtm-data-id" data-gtm-value="339"></div>
                                    <div class="gtm-data-name"
                                         data-gtm-value="1 Day Acuvue Moist (30&nbsp;lenses)"></div>
                                    <div class="gtm-data-price" data-gtm-value="85.99"></div>
                                </div>
                            </div>
