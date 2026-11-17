<x-guest.layout
    title="Plans & services"
    description="Explore AI strategy plans, signals, account status tiers, staking, real estate and virtual cards, with terms and fees shown before you commit."
    image="assets/guest/img/planning-session.jpg">

    @push('head')
        <script type="application/ld+json">
            {!! json_encode([
                '@context' => 'https://schema.org',
                '@type' => 'WebPage',
                'name' => 'Plans & services | ' . config('app.name'),
                'description' => 'Product families, plan parameters and fee transparency for PrimesLedger accounts.',
                'url' => route('funding'),
                'isPartOf' => ['@type' => 'WebSite', 'name' => config('app.name'), 'url' => url('/')],
            ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}
        </script>
    @endpush

    <section class="page-hero">
        <div class="container page-hero__inner">
            <div>
                <nav class="breadcrumb" aria-label="Breadcrumb">
                    <a href="{{ url('/') }}">Home</a>
                    <x-guest.icon name="chevron-down" :size="13" style="transform: rotate(-90deg)" />
                    <span aria-current="page">Plans &amp; services</span>
                </nav>

                <p class="eyebrow">Plans &amp; services</p>
                <h1>Know what you are committing to.</h1>
                <p class="lead">
                    PrimesLedger offers several product families, each with a different duration,
                    liquidity profile and risk. This page explains how each one works and where its
                    terms are shown. Current plan amounts and rates appear inside your account before
                    you confirm anything.
                </p>

                <div class="quick-links" aria-label="Jump to a service">
                    <a href="#ai-plans">AI strategy plans</a>
                    <a href="#signal-plans">Signal plans</a>
                    <a href="#status-plans">Status plans</a>
                    <a href="#staking">Staking</a>
                    <a href="#real-estate">Real estate</a>
                    <a href="#virtual-cards">Virtual cards</a>
                    <a href="#wallets">Wallets &amp; transfers</a>
                    <a href="#fees">Fees</a>
                </div>
            </div>

            <aside class="page-hero__aside" aria-label="At a glance">
                <p>At a glance</p>
                <ul>
                    <li><x-guest.icon name="check-circle" :size="15" /> Account creation is free</li>
                    <li><x-guest.icon name="check-circle" :size="15" /> Live plan amounts shown in-account</li>
                    <li><x-guest.icon name="check-circle" :size="15" /> Staking terms of one to six days</li>
                    <li><x-guest.icon name="check-circle" :size="15" /> Withdrawal requests reviewed before release</li>
                </ul>
            </aside>
        </div>
    </section>

    {{-- ============================ PLANS ============================ --}}
    <section class="section" id="ai-plans" aria-labelledby="ai-title">
        <div class="container">
            <div class="section-head section-head--wide">
                <p class="eyebrow">Plan-based products</p>
                <h2 class="h2" id="ai-title">Three plan families, three different purposes.</h2>
                <p class="lead">
                    A plan is a fixed commitment for a stated period. The amount, duration and any
                    target return are set by the plan itself, so read them together rather than
                    looking at the target figure alone.
                </p>
            </div>

            <div class="plan-grid">
                <article class="plan-card">
                    <div class="plan-card__head">
                        <span class="plan-card__name">AI strategy</span>
                        <span class="plan-card__icon"><x-guest.icon name="cpu" :size="19" /></span>
                    </div>
                    <h3>AI strategy plans</h3>
                    <p>
                        An allocation held for a fixed duration under the plan's stated strategy.
                        The plan shows a target ROI; it does not guarantee that result.
                    </p>
                    <dl class="plan-meta">
                        <div><dt>Plan amount</dt><dd>Shown in-account</dd></div>
                        <div><dt>Duration</dt><dd>Set per plan</dd></div>
                        <div><dt>Target ROI</dt><dd>Disclosed, not guaranteed</dd></div>
                    </dl>
                    <div class="plan-card__foot">
                        <a href="{{ route('register') }}" class="btn btn--secondary btn--block">
                            View live plans after sign-up
                        </a>
                    </div>
                </article>

                <article class="plan-card" id="signal-plans">
                    <div class="plan-card__head">
                        <span class="plan-card__name">Market signals</span>
                        <span class="plan-card__icon"><x-guest.icon name="activity" :size="19" /></span>
                    </div>
                    <h3>Signal plans</h3>
                    <p>
                        Access to market signal plans with a stated strength and duration. Signal
                        strength is a plan parameter, not a probability of profit.
                    </p>
                    <dl class="plan-meta">
                        <div><dt>Plan amount</dt><dd>Shown in-account</dd></div>
                        <div><dt>Duration</dt><dd>Set per plan</dd></div>
                        <div><dt>Signal strength</dt><dd>Stated per plan</dd></div>
                    </dl>
                    <div class="plan-card__foot">
                        <a href="{{ route('register') }}" class="btn btn--secondary btn--block">
                            View live plans after sign-up
                        </a>
                    </div>
                </article>

                <article class="plan-card" id="status-plans">
                    <div class="plan-card__head">
                        <span class="plan-card__name">Account access</span>
                        <span class="plan-card__icon"><x-guest.icon name="layers" :size="19" /></span>
                    </div>
                    <h3>Account status plans</h3>
                    <p>
                        Time-bound account tiers. A status plan changes your account level for the
                        stated term; it does not add a market return of its own.
                    </p>
                    <dl class="plan-meta">
                        <div><dt>Tier fee</dt><dd>Shown in-account</dd></div>
                        <div><dt>Duration</dt><dd>Set per tier</dd></div>
                        <div><dt>Account level</dt><dd>Applies for the term</dd></div>
                    </dl>
                    <div class="plan-card__foot">
                        <a href="{{ route('register') }}" class="btn btn--secondary btn--block">
                            View live tiers after sign-up
                        </a>
                    </div>
                </article>
            </div>

            <div class="plan-note">
                <x-guest.icon name="alert" :size="17" />
                <p>
                    Plan availability and parameters can change. The authoritative version is the one
                    displayed in your account at the moment you confirm a purchase, together with the
                    risk disclosure and terms you accept.
                </p>
            </div>
        </div>
    </section>

    {{-- ============================ STAKING ============================ --}}
    <section class="section section--muted" id="staking" aria-labelledby="staking-title">
        <div class="container split">
            <div class="split__body">
                <p class="eyebrow">Crypto staking</p>
                <h2 class="h2" id="staking-title">Short terms, stated assets, recorded outcomes.</h2>
                <p class="lead">
                    Staking lets you commit a supported asset to a term of one to six days. When the
                    term completes, the result is recorded against the stake — and that result can be a
                    loss as well as a gain.
                </p>

                <ul class="check-list">
                    <li>
                        <span class="check-list__icon"><x-guest.icon name="check" :size="13" /></span>
                        <span><strong>Supported assets.</strong> Bitcoin, Ethereum, Tether, Solana, Polygon, Avalanche and other listed assets.</span>
                    </li>
                    <li>
                        <span class="check-list__icon"><x-guest.icon name="check" :size="13" /></span>
                        <span><strong>Terms from one to six days.</strong> You choose the duration before confirming.</span>
                    </li>
                    <li>
                        <span class="check-list__icon"><x-guest.icon name="check" :size="13" /></span>
                        <span><strong>Outcome recorded at completion.</strong> Profit or loss is posted to your staking history.</span>
                    </li>
                </ul>

                <div class="mt-24">
                    <a href="{{ route('register') }}" class="btn btn--primary">
                        Open an account to stake
                    </a>
                </div>
            </div>

            <div class="split__media">
                <div class="plan-card">
                    <div class="plan-card__head">
                        <span class="plan-card__name">Example term</span>
                        <span class="plan-card__icon"><x-guest.icon name="coins" :size="19" /></span>
                    </div>
                    <h3>How a stake is structured</h3>
                    <dl class="plan-meta mt-16">
                        <div><dt>Asset</dt><dd>Bitcoin (BTC)</dd></div>
                        <div><dt>Amount</dt><dd>Chosen by you</dd></div>
                        <div><dt>Duration</dt><dd>1 to 6 days</dd></div>
                        <div><dt>Outcome</dt><dd>Profit or loss at completion</dd></div>
                    </dl>
                    <p class="muted" style="font-size: 0.8rem; line-height: 1.6;">
                        Example structure only. Supported assets and available terms are shown on the
                        staking screen in your account. Staking is not risk-free.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================ REAL ESTATE ============================ --}}
    <section class="section" id="real-estate" aria-labelledby="real-estate-title">
        <div class="container">
            <div class="section-head section-head--wide">
                <p class="eyebrow">Real estate</p>
                <h2 class="h2" id="real-estate-title">Property listings with the documents attached.</h2>
                <p class="lead">
                    Real estate opportunities are listed with a minimum participation, a stated
                    strategy, a target ROI and supporting documents. They are long-term, illiquid
                    commitments rather than short-term trades.
                </p>
            </div>

            <div class="service-grid">
                <article class="service-card">
                    <span class="service-card__icon"><x-guest.icon name="home" :size="21" /></span>
                    <div>
                        <h3>What each listing shows</h3>
                        <p>
                            Minimum participation, target ROI, strategy type and a description of the
                            property or project. Target figures are not guarantees.
                        </p>
                        <div class="service-card__meta">
                            <span class="tag">Minimum</span>
                            <span class="tag">Target ROI</span>
                            <span class="tag">Strategy</span>
                        </div>
                    </div>
                </article>

                <article class="service-card">
                    <span class="service-card__icon"><x-guest.icon name="file-text" :size="21" /></span>
                    <div>
                        <h3>Documents before commitment</h3>
                        <p>
                            Depending on the listing, you can review site plans, investment decks,
                            demographics, organisational charts and sponsor track records.
                        </p>
                        <div class="service-card__meta">
                            <span class="tag">Site plans</span>
                            <span class="tag">Decks</span>
                            <span class="tag">Track record</span>
                        </div>
                    </div>
                </article>

                <article class="service-card">
                    <span class="service-card__icon"><x-guest.icon name="briefcase" :size="21" /></span>
                    <div>
                        <h3>Strategy types</h3>
                        <p>
                            Listings describe whether the approach is fixed income or growth and
                            income. Read the documents to understand how that applies to each property.
                        </p>
                        <div class="service-card__meta">
                            <span class="tag">Fixed income</span>
                            <span class="tag">Growth &amp; income</span>
                        </div>
                    </div>
                </article>

                <article class="service-card">
                    <span class="service-card__icon"><x-guest.icon name="alert" :size="21" /></span>
                    <div>
                        <h3>Risk and liquidity</h3>
                        <p>
                            Property values can fall, income can be lower than targeted and capital may
                            be locked for long periods. Only invest what you can afford to lose.
                        </p>
                        <div class="service-card__meta">
                            <span class="tag tag--green">Illiquid</span>
                            <span class="tag tag--green">Capital at risk</span>
                        </div>
                    </div>
                </article>
            </div>

            <div class="plan-note">
                <x-guest.icon name="alert" :size="17" />
                <p>
                    Property listings are not suitable for everyone and may not be available in every
                    jurisdiction. Review the full listing documents and your own circumstances before
                    committing capital.
                </p>
            </div>
        </div>
    </section>

    {{-- ============================ CARDS / WALLETS ============================ --}}
    <section class="section section--muted" aria-labelledby="services-title">
        <div class="container">
            <div class="section-head section-head--wide">
                <p class="eyebrow">Everyday services</p>
                <h2 class="h2" id="services-title">Wallets, swaps and a card for spending.</h2>
                <p class="lead">
                    Beyond plans, the account includes the tools needed to hold supported assets and
                    move value. Each action is recorded in your transaction history.
                </p>
            </div>

            <div class="service-grid">
                <article class="service-card" id="wallets">
                    <span class="service-card__icon"><x-guest.icon name="wallet" :size="21" /></span>
                    <div>
                        <h3>Crypto wallets</h3>
                        <p>
                            In-platform wallets for Bitcoin, Ethereum, Tether, Solana, Polygon and XRP.
                            Balances sit alongside your main account balance.
                        </p>
                        <div class="service-card__meta">
                            <span class="tag">BTC</span>
                            <span class="tag">ETH</span>
                            <span class="tag">USDT</span>
                            <span class="tag">SOL</span>
                            <span class="tag">MATIC</span>
                            <span class="tag">XRP</span>
                        </div>
                    </div>
                </article>

                <article class="service-card">
                    <span class="service-card__icon"><x-guest.icon name="refresh" :size="21" /></span>
                    <div>
                        <h3>Wallet swap</h3>
                        <p>
                            Swap between supported wallet balances from one screen. Review the amount
                            and the resulting balance before confirming the swap.
                        </p>
                        <div class="service-card__meta">
                            <span class="tag">Internal swap</span>
                            <span class="tag">Supported assets only</span>
                        </div>
                    </div>
                </article>

                <article class="service-card" id="virtual-cards">
                    <span class="service-card__icon"><x-guest.icon name="credit-card" :size="21" /></span>
                    <div>
                        <h3>Virtual cards</h3>
                        <p>
                            Request a virtual card funded from your available balance. A one-time
                            issuance fee is displayed before you confirm; the platform default is $250,
                            and your account may show a different amount.
                        </p>
                        <div class="service-card__meta">
                            <span class="tag">Issuance fee shown first</span>
                            <span class="tag">Balance funded</span>
                        </div>
                    </div>
                </article>

                <article class="service-card">
                    <span class="service-card__icon"><x-guest.icon name="arrow-up-right" :size="21" /></span>
                    <div>
                        <h3>Deposits &amp; withdrawals</h3>
                        <p>
                            Fund your account through the methods shown on the deposit screen. Submit
                            withdrawals from your available balance; each request is recorded and reviewed.
                        </p>
                        <div class="service-card__meta">
                            <span class="tag">Recorded</span>
                            <span class="tag">Reviewed</span>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    {{-- ============================ FEES ============================ --}}
    <section class="section" id="fees" aria-labelledby="fees-title">
        <div class="container">
            <div class="section-head section-head--wide">
                <p class="eyebrow">Fees</p>
                <h2 class="h2" id="fees-title">Where charges can apply.</h2>
                <p class="lead">
                    Charges differ by service. The table explains what is charged and where the exact
                    figure is shown. Network fees, where they apply, are set by the relevant network
                    rather than by PrimesLedger.
                </p>
            </div>

            <div class="table-wrap">
                <div class="table-scroll">
                    <table class="fee-table">
                        <caption class="sr-only">PrimesLedger service charges and where each amount is shown</caption>
                        <thead>
                            <tr>
                                <th scope="col">Service</th>
                                <th scope="col">What is charged</th>
                                <th scope="col">Where the amount is shown</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>AI strategy plan</td>
                                <td>The plan's allocation amount for its stated duration</td>
                                <td>On the plan before you confirm</td>
                            </tr>
                            <tr>
                                <td>Signal plan</td>
                                <td>The plan amount for its stated duration</td>
                                <td>On the plan before you confirm</td>
                            </tr>
                            <tr>
                                <td>Account status plan</td>
                                <td>The tier fee for its stated duration</td>
                                <td>On the tier before you activate it</td>
                            </tr>
                            <tr>
                                <td>Crypto staking</td>
                                <td>The amount staked for the chosen one to six day term</td>
                                <td>On the staking form before you confirm</td>
                            </tr>
                            <tr>
                                <td>Real estate</td>
                                <td>The minimum participation stated on the listing</td>
                                <td>In the listing and its documents</td>
                            </tr>
                            <tr>
                                <td>Virtual card</td>
                                <td>A one-time issuance fee (platform default $250; account amount may differ)</td>
                                <td>Before the card request is confirmed</td>
                            </tr>
                            <tr>
                                <td>Deposits</td>
                                <td>Any network or payment provider fee for the chosen method</td>
                                <td>On the deposit screen</td>
                            </tr>
                            <tr>
                                <td>Withdrawals</td>
                                <td>Any network or payment provider fee, plus review before release</td>
                                <td>On the withdrawal request screen</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="plan-note">
                <x-guest.icon name="shield-check" :size="17" />
                <p>
                    No charge should appear for the first time after you have committed. If a figure
                    on a confirmation screen is unclear, stop and contact support before proceeding.
                </p>
            </div>

            <div class="mt-40 text-center">
                <a href="{{ route('register') }}" class="btn btn--primary btn--lg">
                    Open an account <x-guest.icon name="arrow-right" :size="16" />
                </a>
                <p class="note-inline mt-16" style="justify-content: center;">
                    <x-guest.icon name="lock" :size="14" />
                    Account creation is free. Deposits are optional.
                </p>
            </div>
        </div>
    </section>
</x-guest.layout>
