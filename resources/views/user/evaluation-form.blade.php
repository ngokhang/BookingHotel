<div id="evaluation-form" class="form">
    <div class="form__header-title">
        <h3>Đánh giá khách sạn {{ $data->name }}</h3>
    </div>
    <div class="form__body-content">
        <form action="#" method="post" class="stars">
            <div>
                <input type="radio" hidden value="1" id="first-star" name="one-star">
                <label for="first-star" class="first-star star">
                    <i class="fas fa-star"></i>
                </label>
            </div>
            <div>
                <input type="radio" hidden value="2" id="second-star" name="two-star">
                <label for="second-star" class="second-star star">
                    <i class="fas fa-star"></i>
                </label>
            </div>
            <div>
                <input type="radio" hidden value="3" id="third-star" name="three-star">
                <label for="third-star" class="third-star star">
                    <i class="fas fa-star"></i>
                </label>
            </div>
            <div>
                <input type="radio" hidden value="4" id="fourth-star" name="four-star">
                <label for="fourth-star" class="fourth-star star">
                    <i class="fas fa-star"></i>
                </label>
            </div>
            <div>
                <input type="radio" hidden value="5" id="fifth-star" name="five-star">
                <label for="fifth-star" class="fifth-star star">
                    <i class="fas fa-star"></i>
                </label>
            </div>

            <button class="btn-submit">Gửi đánh giá</button>
        </form>
    </div>
</div>
