<x-guest.layout
    title="Digital asset management and investment tools"
    description="PrimesLedger brings deposits, supported crypto wallets and structured investment plans into one clearly organised account, with fees and risks shown first."
    image="assets/guest/img/planning-session.jpg">

    @push('head')
        <script type="application/ld+json">
            {!! json_encode([
                '@context' => 'https://schema.org',
                '@graph' => [
                    [
                        '@type' => 'Organization',
                        '@id' => url('/') . '#organization',
                        'name' => config('app.name'),
                        'url' => url('/'),
                        'logo' => asset('assets/guest/brand/favicon.svg'),
                        'email' => config('app.Admin_email'),
                        'description' => 'Digital finance platform for managing supported crypto assets and structured investment plans.',
                    ],
                    [
                        '@type' => 'WebSite',
                        '@id' => url('/') . '#website',
                        'url' => url('/'),
                        'name' => config('app.name'),
                        'publisher' => ['@id' => url('/') . '#organization'],
                    ],
                ],
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
        </script>
    @endpush

    {{-- ============================ HERO ============================ --}}
    <section class="hero" aria-labelledby="hero-title">
        <div class="container hero__grid">
            <div class="hero__copy">
                <p class="eyebrow">Digital asset management</p>

                <h1 class="hero__title" id="hero-title">
                    Digital assets, managed with <span class="u-accent">clarity</span>.
                </h1>

                <p class="hero__lead">
                    PrimesLedger brings deposits, withdrawals, supported crypto wallets and
                    structured investment plans into one account — with fees, durations and risks
                    shown before you commit.
                </p>

                <div class="hero__actions">
                    <a href="{{ route('register') }}" class="btn btn--primary btn--lg">
                        Open an account
                        <x-guest.icon name="arrow-right" :size="17" />
                    </a>
                    <a href="{{ route('funding') }}" class="btn btn--secondary btn--lg">
                        Explore plans &amp; services
                    </a>
                </div>

                <ul class="hero__points">
                    <li><x-guest.icon name="check-circle" :size="16" /> Identity verification built in</li>
                    <li><x-guest.icon name="check-circle" :size="16" /> Reviewable transaction records</li>
                    <li><x-guest.icon name="check-circle" :size="16" /> Withdrawal requests reviewed</li>
                </ul>

                <p class="hero__meta">
                    Account creation is free. Product participation is optional and subject to
                    eligibility checks, the terms shown in your account and your own assessment of risk.
                </p>
            </div>

            <div class="hero__visual">
                <div class="mock" role="img"
                    aria-label="Illustrative PrimesLedger account interface showing a portfolio summary, an activity chart, recent deposits and a withdrawal request in review.">
                    <div class="mock__bar" aria-hidden="true">
                        <span class="mock__dots"><span></span><span></span><span></span></span>
                        <span class="mock__url">app.primesledger.com</span>
                        <span class="mock__tag">Demo</span>
                    </div>

                    <div class="mock__body" aria-hidden="true">
                        <aside class="mock__side">
                            <p class="mock__side-label">Account</p>
                            <span class="mock__nav-item is-active">
                                <x-guest.icon name="pie-chart" :size="14" /> Overview
                            </span>
                            <span class="mock__nav-item">
                                <x-guest.icon name="wallet" :size="14" /> Deposit
                            </span>
                            <span class="mock__nav-item">
                                <x-guest.icon name="arrow-up-right" :size="14" /> Withdraw
                            </span>
                            <span class="mock__nav-item">
                                <x-guest.icon name="cpu" :size="14" /> AI plans
                            </span>
                            <span class="mock__nav-item">
                                <x-guest.icon name="coins" :size="14" /> Wallets
                            </span>
                            <span class="mock__nav-item">
                                <x-guest.icon name="credit-card" :size="14" /> Card
                            </span>
                        </aside>

                        <div class="mock__main">
                            <div class="mock__hello">
                                <div>
                                    <strong>Portfolio overview</strong>
                                    <span>Illustrative account</span>
                                </div>
                                <span class="mock__pill">Example data</span>
                            </div>

                            <div class="mock__balance">
                                <div class="mock__balance-label">
                                    <span>Total portfolio value</span>
                                    <x-guest.icon name="shield-check" :size="13" />
                                </div>
                                <div class="mock__balance-value">$28,640.00</div>
                                <div class="mock__balance-foot">
                                    <x-guest.icon name="activity" :size="11" />
                                    Example allocation across wallets and plans
                                </div>
                            </div>

                            <div class="mock__stats">
                                <div class="mock__stat">
                                    <span>Available balance</span>
                                    <strong>$6,240.00</strong>
                                </div>
                                <div class="mock__stat">
                                    <span>In active plans</span>
                                    <strong>$22,400.00</strong>
                                </div>
                                <div class="mock__stat">
                                    <span>Pending review</span>
                                    <strong>$0.00</strong>
                                </div>
                            </div>

                            <div class="mock__chart">
                                <div class="mock__chart-head">
                                    <span>Account activity</span>
                                    <b>Last 30 days</b>
                                </div>
                                <svg viewBox="0 0 320 64" preserveAspectRatio="none">
                                    <defs>
                                        <linearGradient id="mockFill" x1="0" y1="0" x2="0" y2="1">
                                            <stop offset="0%" stop-color="#1BA36F" stop-opacity="0.16" />
                                            <stop offset="100%" stop-color="#1BA36F" stop-opacity="0" />
                                        </linearGradient>
                                    </defs>
                                    <path d="M0 52 L32 46 L64 48 L96 38 L128 41 L160 30 L192 34 L224 22 L256 26 L288 16 L320 19 L320 64 L0 64 Z" fill="url(#mockFill)" />
                                    <path d="M0 52 L32 46 L64 48 L96 38 L128 41 L160 30 L192 34 L224 22 L256 26 L288 16 L320 19"
                                        fill="none" stroke="#148A5E" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" />
                                </svg>
                            </div>

                            <div class="mock__rows">
                                <div class="mock__row">
                                    <span class="mock__row-icon"><x-guest.icon name="wallet" :size="12" /></span>
                                    <span class="mock__row-name">Deposit · BTC<small>Example transaction</small></span>
                                    <span class="mock__chip mock__chip--done">Confirmed</span>
                                </div>
                                <div class="mock__row">
                                    <span class="mock__row-icon"><x-guest.icon name="cpu" :size="12" /></span>
                                    <span class="mock__row-name">AI strategy plan<small>Example plan</small></span>
                                    <span class="mock__chip mock__chip--done">Active</span>
                                </div>
                                <div class="mock__row">
                                    <span class="mock__row-icon"><x-guest.icon name="arrow-up-right" :size="12" /></span>
                                    <span class="mock__row-name">Withdrawal request<small>Example request</small></span>
                                    <span class="mock__chip mock__chip--review">In review</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mock__float">
                    <span class="mock__float-icon"><x-guest.icon name="shield-check" :size="16" /></span>
                    <span>
                        <strong>Withdrawals are reviewed</strong>
                        <span>Before funds are released</span>
                    </span>
                </div>

                <p class="mock-caption">
                    Illustrative interface. Figures and activity shown are examples, not live results or performance.
                </p>
            </div>
        </div>
    </section>

    {{-- ============================ TRUST STRIP ============================ --}}
    <section class="trust-strip" aria-label="Platform safeguards">
        <div class="container">
            <div class="trust-strip__grid">
                <div class="trust-strip__item">
                    <x-guest.icon name="shield-check" :size="19" />
                    <div>
                        <strong>Identity verification</strong>
                        <span>Account checks before key features</span>
                    </div>
                </div>
                <div class="trust-strip__item">
                    <x-guest.icon name="file-text" :size="19" />
                    <div>
                        <strong>Transaction records</strong>
                        <span>Deposits, plans and withdrawals logged</span>
                    </div>
                </div>
                <div class="trust-strip__item">
                    <x-guest.icon name="clock" :size="19" />
                    <div>
                        <strong>Withdrawal review</strong>
                        <span>Requests checked before release</span>
                    </div>
                </div>
                <div class="trust-strip__item">
                    <x-guest.icon name="message" :size="19" />
                    <div>
                        <strong>Human support</strong>
                        <span>Email the team when something is unclear</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================ PLATFORM ============================ --}}
    <section class="section" id="platform" aria-labelledby="platform-title">
        <div class="container">
            <div class="section-head section-head--wide">
                <p class="eyebrow">The platform</p>
                <h2 class="h2" id="platform-title">One place for the parts that usually live in five.</h2>
                <p class="lead">
                    Balances, supported wallets, plans and card requests sit inside the same account,
                    so you can see what is available, what is committed and what is still in review.
                </p>
            </div>

            <div class="bento">
                <article class="feature-card feature-card--wide">
                    <div>
                        <span class="feature-card__icon"><x-guest.icon name="pie-chart" :size="21" /></span>
                        <h3>Portfolio overview</h3>
                        <p>
                            See available balance, active plans, wallet allocations and recent activity
                            in one view. Nothing is buried behind a separate login.
                        </p>
                        <div class="feature-card__foot">
                            <a href="{{ route('register') }}" class="link-arrow">
                                Open an account <x-guest.icon name="arrow-up-right" :size="15" />
                            </a>
                        </div>
                    </div>

                    <div class="feature-visual" aria-hidden="true">
                        <div class="feature-visual__head">
                            <span>Allocation</span>
                            <b>Example</b>
                        </div>
                        <div class="feature-bars">
                            <span style="height: 42%"></span>
                            <span style="height: 58%"></span>
                            <span style="height: 36%"></span>
                            <span style="height: 72%"></span>
                            <span style="height: 48%"></span>
                            <span style="height: 64%"></span>
                            <span style="height: 38%"></span>
                            <span style="height: 82%"></span>
                            <span style="height: 56%"></span>
                            <span style="height: 70%"></span>
                            <span style="height: 44%"></span>
                            <span style="height: 60%"></span>
                        </div>
                        <div class="feature-visual__legend">
                            <span>Wallets</span>
                            <span>Plans</span>
                            <span>Available</span>
                        </div>
                    </div>
                </article>

                <article class="feature-card">
                    <span class="feature-card__icon"><x-guest.icon name="wallet" :size="21" /></span>
                    <h3>Deposits &amp; withdrawals</h3>
                    <p>
                        Fund your account through supported methods and request withdrawals from the
                        same balance view. Every movement is recorded.
                    </p>
                </article>

                <article class="feature-card">
                    <span class="feature-card__icon"><x-guest.icon name="cpu" :size="21" /></span>
                    <h3>AI strategy plans</h3>
                    <p>
                        Choose an allocation amount and duration. The plan's stated target ROI and
                        terms are visible before you confirm.
                    </p>
                </article>

                <article class="feature-card">
                    <span class="feature-card__icon"><x-guest.icon name="activity" :size="21" /></span>
                    <h3>Signals &amp; status plans</h3>
                    <p>
                        Explore signal plans with stated strength and duration, or time-bound
                        account status tiers with their fee shown up front.
                    </p>
                </article>

                <article class="feature-card">
                    <span class="feature-card__icon"><x-guest.icon name="credit-card" :size="21" /></span>
                    <h3>Wallets, swap &amp; cards</h3>
                    <p>
                        Hold supported crypto in-platform, swap between wallets and request a
                        virtual card funded from your balance.
                    </p>
                </article>
            </div>
        </div>
    </section>

    {{-- ============================ PRODUCTS ============================ --}}
    <section class="section section--muted" id="products" aria-labelledby="products-title">
        <div class="container">
            <div class="section-head section-head--wide">
                <p class="eyebrow">Products</p>
                <h2 class="h2" id="products-title">Products with terms you can read first.</h2>
                <p class="lead">
                    Each product family below has a different risk profile and liquidity. Current
                    availability, minimums, durations and target returns are shown inside your
                    account before any purchase is confirmed.
                </p>
            </div>

            <div class="product-grid">
                <article class="product-card">
                    <div class="product-card__head">
                        <span class="product-card__icon"><x-guest.icon name="cpu" :size="21" /></span>
                        <span class="product-card__tag">Allocation</span>
                    </div>
                    <h3>AI strategy plans</h3>
                    <p>
                        Duration-based plans with a defined allocation and stated target ROI.
                        You see the full plan terms before confirming.
                    </p>
                    <ul class="product-card__list">
                        <li><x-guest.icon name="check" :size="14" /> Allocation amount and duration stated</li>
                        <li><x-guest.icon name="check" :size="14" /> Target ROI disclosed, never guaranteed</li>
                        <li><x-guest.icon name="check" :size="14" /> Plan activity visible in your dashboard</li>
                    </ul>
                    <div class="product-card__foot">
                        <a href="{{ route('funding') }}#ai-plans" class="link-arrow">
                            Plan details <x-guest.icon name="arrow-up-right" :size="15" />
                        </a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-card__head">
                        <span class="product-card__icon"><x-guest.icon name="activity" :size="21" /></span>
                        <span class="product-card__tag">Signals</span>
                    </div>
                    <h3>Signal plans</h3>
                    <p>
                        Market signal plans defined by amount, duration and stated signal strength.
                        Signals are informational and outcomes are not guaranteed.
                    </p>
                    <ul class="product-card__list">
                        <li><x-guest.icon name="check" :size="14" /> Signal strength and duration stated</li>
                        <li><x-guest.icon name="check" :size="14" /> Terms accepted before activation</li>
                        <li><x-guest.icon name="check" :size="14" /> No profit figure presented as certain</li>
                    </ul>
                    <div class="product-card__foot">
                        <a href="{{ route('funding') }}#signal-plans" class="link-arrow">
                            Plan details <x-guest.icon name="arrow-up-right" :size="15" />
                        </a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-card__head">
                        <span class="product-card__icon"><x-guest.icon name="layers" :size="21" /></span>
                        <span class="product-card__tag">Access</span>
                    </div>
                    <h3>Account status plans</h3>
                    <p>
                        Time-bound account tiers with a stated fee and duration. Status does not
                        change the market risk of any product.
                    </p>
                    <ul class="product-card__list">
                        <li><x-guest.icon name="check" :size="14" /> Fee and duration shown before activation</li>
                        <li><x-guest.icon name="check" :size="14" /> Status applies for the stated term</li>
                        <li><x-guest.icon name="check" :size="14" /> No return is implied by status alone</li>
                    </ul>
                    <div class="product-card__foot">
                        <a href="{{ route('funding') }}#status-plans" class="link-arrow">
                            Plan details <x-guest.icon name="arrow-up-right" :size="15" />
                        </a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-card__head">
                        <span class="product-card__icon"><x-guest.icon name="coins" :size="21" /></span>
                        <span class="product-card__tag">Staking</span>
                    </div>
                    <h3>Crypto staking</h3>
                    <p>
                        Stake supported assets for terms of one to six days. Results, including any
                        loss, are recorded when the term completes.
                    </p>
                    <ul class="product-card__list">
                        <li><x-guest.icon name="check" :size="14" /> BTC, ETH, USDT, SOL, MATIC, AVAX and more</li>
                        <li><x-guest.icon name="check" :size="14" /> One to six day terms</li>
                        <li><x-guest.icon name="check" :size="14" /> Profit or loss posted at completion</li>
                    </ul>
                    <div class="product-card__foot">
                        <a href="{{ route('funding') }}#staking" class="link-arrow">
                            Staking details <x-guest.icon name="arrow-up-right" :size="15" />
                        </a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-card__head">
                        <span class="product-card__icon"><x-guest.icon name="home" :size="21" /></span>
                        <span class="product-card__tag">Property</span>
                    </div>
                    <h3>Real estate opportunities</h3>
                    <p>
                        Selected property opportunities with stated minimums, strategy and supporting
                        documents such as site plans and sponsor track records.
                    </p>
                    <ul class="product-card__list">
                        <li><x-guest.icon name="check" :size="14" /> Minimum and strategy on each listing</li>
                        <li><x-guest.icon name="check" :size="14" /> Documents available before you commit</li>
                        <li><x-guest.icon name="check" :size="14" /> Illiquid by nature; capital at risk</li>
                    </ul>
                    <div class="product-card__foot">
                        <a href="{{ route('funding') }}#real-estate" class="link-arrow">
                            Property details <x-guest.icon name="arrow-up-right" :size="15" />
                        </a>
                    </div>
                </article>

                <article class="product-card">
                    <div class="product-card__head">
                        <span class="product-card__icon"><x-guest.icon name="credit-card" :size="21" /></span>
                        <span class="product-card__tag">Payments</span>
                    </div>
                    <h3>Virtual cards</h3>
                    <p>
                        Request a virtual card funded from your account balance. A one-time issuance
                        fee is shown before you confirm.
                    </p>
                    <ul class="product-card__list">
                        <li><x-guest.icon name="check" :size="14" /> Issuance fee displayed up front</li>
                        <li><x-guest.icon name="check" :size="14" /> Funded from your available balance</li>
                        <li><x-guest.icon name="check" :size="14" /> Card details available in your account</li>
                    </ul>
                    <div class="product-card__foot">
                        <a href="{{ route('funding') }}#virtual-cards" class="link-arrow">
                            Card details <x-guest.icon name="arrow-up-right" :size="15" />
                        </a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- ============================ REAL ESTATE ============================ --}}
    <section class="section" aria-labelledby="property-title">
        <div class="container split">
            <div class="split__media">
                <div class="media-frame">
                    <img src="{{ asset('assets/guest/img/property.jpg') }}"
                        alt="Modern commercial property exterior with glass frontage"
                        width="1200" height="900" loading="lazy" decoding="async">
                    <span class="media-badge">
                        <x-guest.icon name="file-text" :size="15" />
                        Documents before commitment
                    </span>
                </div>
            </div>

            <div class="split__body">
                <p class="eyebrow">Real assets</p>
                <h2 class="h2" id="property-title">Property opportunities, documented.</h2>
                <p class="lead">
                    Selected real estate listings include the minimum participation, stated strategy,
                    target ROI and supporting documents. Review the material in your account before
                    deciding whether the risk fits you.
                </p>

                <ul class="check-list">
                    <li>
                        <span class="check-list__icon"><x-guest.icon name="check" :size="13" /></span>
                        <span><strong>Clear minimums and strategy.</strong> Each listing states its minimum and approach.</span>
                    </li>
                    <li>
                        <span class="check-list__icon"><x-guest.icon name="check" :size="13" /></span>
                        <span><strong>Supporting documentation.</strong> Site plans, decks and track records where provided.</span>
                    </li>
                    <li>
                        <span class="check-list__icon"><x-guest.icon name="check" :size="13" /></span>
                        <span><strong>No guaranteed outcome.</strong> Target ROI is a target, not a promise of return.</span>
                    </li>
                </ul>

                <div class="callout callout--amber">
                    <x-guest.icon name="alert" :size="17" />
                    <p>
                        Property investments can be illiquid, and the value of an asset can fall.
                        Only commit capital you can afford to lose and read the listing documents in full.
                    </p>
                </div>

                <div class="mt-24">
                    <a href="{{ route('funding') }}#real-estate" class="link-arrow">
                        See real estate services <x-guest.icon name="arrow-up-right" :size="15" />
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================ HOW IT WORKS ============================ --}}
    <section class="section section--muted" id="how-it-works" aria-labelledby="how-title">
        <div class="container">
            <div class="section-head section-head--wide">
                <p class="eyebrow">How it works</p>
                <h2 class="h2" id="how-title">From account to activity, in four steps.</h2>
                <p class="lead">
                    The sequence is deliberately simple. You can stop after verification and use the
                    dashboard without committing any capital.
                </p>
            </div>

            <ol class="steps" style="list-style: none;">
                <li class="step">
                    <span class="step__num">01</span>
                    <h3>Create your account</h3>
                    <p>
                        Register with your email, phone number and country. No deposit is required
                        to open an account.
                    </p>
                </li>
                <li class="step">
                    <span class="step__num">02</span>
                    <h3>Complete verification</h3>
                    <p>
                        Submit the requested identity details so the team can review your account
                        before key features are enabled.
                    </p>
                </li>
                <li class="step">
                    <span class="step__num">03</span>
                    <h3>Fund and choose</h3>
                    <p>
                        Deposit through a supported method, then review the plans, staking terms or
                        listings available to your account.
                    </p>
                </li>
                <li class="step">
                    <span class="step__num">04</span>
                    <h3>Track and withdraw</h3>
                    <p>
                        Follow activity in the dashboard and submit a withdrawal request when you
                        want to move available funds out.
                    </p>
                </li>
            </ol>

            <div class="proof-panel mt-40">
                <div class="proof-panel__item">
                    <x-guest.icon name="file-text" :size="20" />
                    <strong>Recorded activity</strong>
                    <p>Deposits, plan purchases, stakes and withdrawals appear in your transaction history.</p>
                </div>
                <div class="proof-panel__item">
                    <x-guest.icon name="lock" :size="20" />
                    <strong>Account access</strong>
                    <p>Sign-in is protected by your password, with password reset handled by email token.</p>
                </div>
                <div class="proof-panel__item">
                    <x-guest.icon name="message" :size="20" />
                    <strong>Direct support</strong>
                    <p>Questions about a fee, plan or withdrawal can be sent to the support inbox.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================ TRANSPARENCY ============================ --}}
    <section class="section" aria-labelledby="transparency-title">
        <div class="container split split--reverse">
            <div class="split__media">
                <div class="media-frame">
                    <img src="{{ asset('assets/guest/img/planning-session.jpg') }}"
                        alt="Two people reviewing financial information together at a desk"
                        width="1200" height="900" loading="lazy" decoding="async">
                    <span class="media-badge">
                        <x-guest.icon name="shield-check" :size="15" />
                        Read the terms before you commit
                    </span>
                </div>
            </div>

            <div class="split__body">
                <p class="eyebrow">Transparency</p>
                <h2 class="h2" id="transparency-title">The numbers you see should match the terms you agreed to.</h2>
                <p class="lead">
                    Every product carries its own duration, fee and risk. Those details belong next to
                    the confirmation step — not in a separate document you find afterwards.
                </p>

                <ul class="check-list">
                    <li>
                        <span class="check-list__icon"><x-guest.icon name="check" :size="13" /></span>
                        <span><strong>Terms before confirmation.</strong> Duration, amount and stated target return are shown together.</span>
                    </li>
                    <li>
                        <span class="check-list__icon"><x-guest.icon name="check" :size="13" /></span>
                        <span><strong>Withdrawals pass review.</strong> Requests are checked before funds are released.</span>
                    </li>
                    <li>
                        <span class="check-list__icon"><x-guest.icon name="check" :size="13" /></span>
                        <span><strong>Risk is stated plainly.</strong> Capital can be lost, and staking results can be negative.</span>
                    </li>
                </ul>

                <div class="callout">
                    <x-guest.icon name="alert" :size="17" />
                    <p>
                        <strong>What this page does not do:</strong> promise returns, publish invented
                        performance figures or imply a partnership with any bank, exchange or property brand.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================ FAQ ============================ --}}
    <section class="section section--muted" id="faq" aria-labelledby="faq-title">
        <div class="container">
            <div class="section-head section-head--center">
                <p class="eyebrow">FAQ</p>
                <h2 class="h2" id="faq-title">Questions people ask before opening an account.</h2>
                <p class="lead">Short answers to the practical questions. The full list is on the FAQ page.</p>
            </div>

            <div class="faq" data-faq-accordion>
                <details class="faq__item" open>
                    <summary>Is PrimesLedger a bank or a broker?</summary>
                    <div class="faq__a">
                        <p>
                            No. PrimesLedger is a digital finance platform for managing supported assets,
                            tracking account activity and exploring investment products. It is not a bank,
                            and the platform does not provide deposit insurance. The legal and company
                            information is set out in the terms.
                        </p>
                    </div>
                </details>

                <details class="faq__item">
                    <summary>Do I have to deposit to create an account?</summary>
                    <div class="faq__a">
                        <p>
                            No. Account creation is free. You can register and complete verification
                            without funding the account. Deposits and product participation are optional.
                        </p>
                    </div>
                </details>

                <details class="faq__item">
                    <summary>Are returns guaranteed?</summary>
                    <div class="faq__a">
                        <p>
                            No. Target returns, ROI figures and staking estimates are not guarantees.
                            The value of an investment can go down as well as up, and staking can produce
                            a loss as well as a gain. Only commit funds you can afford to lose.
                        </p>
                    </div>
                </details>

                <details class="faq__item">
                    <summary>How do withdrawals work?</summary>
                    <div class="faq__a">
                        <p>
                            You submit a withdrawal request from your account. The request is recorded and
                            reviewed before funds are released. Review can take time, and the status is
                            visible in your withdrawal history.
                        </p>
                    </div>
                </details>

                <details class="faq__item">
                    <summary>Which cryptocurrencies are supported?</summary>
                    <div class="faq__a">
                        <p>
                            The platform supports wallets for Bitcoin (BTC), Ethereum (ETH), Tether (USDT),
                            Solana (SOL), Polygon (MATIC), XRP and other listed assets. Supported assets and
                            networks can change, so check the wallet screen before sending funds.
                        </p>
                    </div>
                </details>

                <details class="faq__item">
                    <summary>What happens if I forget my password?</summary>
                    <div class="faq__a">
                        <p>
                            Use the <a href="{{ route('forgot_password') }}">forgot password</a> page.
                            A single-use reset link is sent to the email address registered on your
                            account. If it does not arrive, contact support.
                        </p>
                    </div>
                </details>
            </div>

            <p class="faq__foot">
                Still unsure? <a href="{{ route('faq') }}">Read the full FAQ</a> or
                <a href="{{ route('contact') }}">contact the team</a>.
            </p>
        </div>
    </section>

    {{-- ============================ CTA ============================ --}}
    <section class="cta-band" aria-labelledby="cta-title">
        <div class="container cta-band__inner">
            <div>
                <p class="eyebrow">Get started</p>
                <h2 id="cta-title">Start with an account, not a deposit.</h2>
                <p class="cta-band__text">
                    Create your account, complete verification and look around. Deposits, plans and
                    card requests remain optional at every stage.
                </p>
            </div>

            <div class="cta-band__actions">
                <a href="{{ route('register') }}" class="btn btn--light btn--lg">
                    Open an account <x-guest.icon name="arrow-right" :size="16" />
                </a>
                <a href="{{ route('contact') }}" class="btn btn--outline-light btn--lg">
                    Talk to support
                </a>
                <p class="cta-band__note">
                    Account creation is free. Product participation is subject to eligibility,
                    risk checks and the terms shown in your account.
                </p>
            </div>
        </div>
    </section>
</x-guest.layout>
