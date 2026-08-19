<!-- Tech Insights Slider -->
@php
    $insightsData = json_decode(file_get_contents(resource_path('data/tech-insights.json')), true) ?? [];
    $insights = $insightsData['insights'] ?? [];
@endphp
<section id="tech-insights" class="tech-insights">
    <div class="section-container">
        <div class="section-header" data-aos="fade-up">
            <span class="section-badge">Tech Insights</span>
            <h2 class="section-title">What's Shaping Technology Right Now</h2>
            <p class="section-description">
                The trends we're building with today — and what they mean for your business.
            </p>
        </div>

        <div class="insights-slider" id="insightsSlider" data-aos="fade-up" data-aos-delay="150">
            <div class="insights-track">
                @foreach($insights as $index => $slide)
                    <div class="insight-slide {{ $index === 0 ? 'active' : '' }}">
                        <div class="insight-image">
                            <img src="{{ asset($slide['image']) }}" alt="{{ $slide['title'] }}" loading="lazy">
                        </div>
                        <div class="insight-caption">
                            <span class="insight-tag">{{ $slide['tag'] }}</span>
                            <h3>{{ $slide['title'] }}</h3>
                            <p>{{ $slide['text'] }}</p>
                            <a href="{{ url($slide['link']) }}" class="insight-link">
                                {{ $slide['link_text'] }} <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="button" class="insight-arrow prev" aria-label="Previous slide">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <button type="button" class="insight-arrow next" aria-label="Next slide">
                <i class="fa-solid fa-chevron-right"></i>
            </button>

            <div class="insight-dots">
                @foreach($insights as $index => $slide)
                    <button type="button" class="insight-dot {{ $index === 0 ? 'active' : '' }}" aria-label="Go to slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
        </div>
    </div>
</section>
