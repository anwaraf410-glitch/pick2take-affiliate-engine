<?php

namespace P2TAE\Import;

defined('ABSPATH') || exit;

class Importer
{
    /**
     * Display Import Products page.
     */
    public function render(): void
    {
        ?>
        <div class="wrap">

            <h1>AliExpress Product Importer</h1>

            <p>
                Search products directly from AliExpress Portals API.
            </p>

            <form method="post">

                <table class="form-table">

                    <tr>

                        <th>Keyword</th>

                        <td>

                            <input
                                type="text"
                                name="keyword"
                                class="regular-text"
                                placeholder="Wireless Earbuds">

                        </td>

                    </tr>

                    <tr>

                        <th>Country</th>

                        <td>

                            <select name="country">

                                <option value="SA">Saudi Arabia</option>

                                <option value="AE">UAE</option>

                                <option value="US">United States</option>

                                <option value="UK">United Kingdom</option>

                            </select>

                        </td>

                    </tr>

                    <tr>

                        <th>Language</th>

                        <td>

                            <select name="language">

                                <option value="EN">English</option>

                                <option value="AR">Arabic</option>

                            </select>

                        </td>

                    </tr>

                    <tr>

                        <th>Results</th>

                        <td>

                            <select name="page_size">

                                <option>10</option>
                                <option selected>20</option>
                                <option>50</option>
                                <option>100</option>

                            </select>

                        </td>

                    </tr>

                </table>

                <?php submit_button('Search Products'); ?>

            </form>

        </div>
        <?php
    }
}