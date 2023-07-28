<template>
    <PageTitle>{{ page_title }}</PageTitle>

    <Collapse accordion v-model="value1" id="qa_all">
        <Panel name="1" id="common">
            常見問題
            <template #content>
                <div class="member">
                    <div class="member_benefits member_benefits_title" id="qa_title">
                        會員權益相關
                    </div>
                    <Collapse accordion v-model="value2">
                        <Panel name="1-1" id="qa">
                            Q：如何查詢我的會員等級
                            <template #content>A：登入您的帳戶，進入「個人設定」或「我的帳戶」，您可以在該頁面上查看您的會員等級</template>
                        </Panel>
                        <Panel name="1-2" id="qa">
                            Q：我忘記了我的會員密碼怎麼辦？
                            <template #content>A：在登入頁面點擊「忘記密碼」，輸入您的註冊電子郵件地址，我們將發送一封郵件給您以重置密碼。</template>
                        </Panel>
                        <Panel name="1-3" id="qa">
                            Q：我可以轉讓我的會員權益嗎？ <template #content>A：會員權益不可轉讓給他人，它們是綁定於您的個人帳戶的。</template>
                        </Panel>
                        <Panel name="1-4" id="qa">
                            Q：如何查詢我的預約紀錄？ <template #content>A：登入您的帳戶，進入「預約紀錄」或「我的訂單」，您可以在該頁面上查看您的預約紀錄。</template>
                        </Panel>
                        <Panel name="1-5" id="qa">
                            Q：會員可以享受多少折扣優惠？
                            <template #content>A：會員可以享受特定漫畫租借的折扣優惠，具體折扣幅度根據漫畫的種類和租借期限而定。</template>
                        </Panel>

                    </Collapse>
                </div>

                
                <div id="qa_title">
                    <div id="qa_title" class="member_benefits_title" >
                        網咖預約相關
                    </div>
                    <Collapse accordion v-model="value2">
                        <Panel name="2-1" id="qa">
                            Q：我可以同時預約多個網咖座位嗎？
                            <template #content>A：是的，您可以一次性預約多個網咖座位，但請確保您在預約期限內使用</template>
                        </Panel>
                        <Panel name="2-2" id="qa">
                            Q：網咖預約需要支付訂金嗎？
                            <template #content>A：視網咖的政策而定，有些網咖可能需要支付訂金作為預約確認，請在預約過程中查看相關須知。</template>
                        </Panel>
                        <Panel name="2-3" id="qa">
                            Q：我可以更改已預約的網咖座位嗎？ <template
                                #content>A：是的，您可以在預約期限內進行座位更改，請登入您的帳戶並進入「網咖預約」功能，按照指示進行更改。</template>
                        </Panel>
                        <Panel name="2-4" id="qa">
                            Q：是否可以取消已預約的網咖座位？ <template
                                #content>A：是的，您可以在預約期限內取消網咖座位，請登入您的帳戶並進入「網咖預約」功能，找到您要取消的預約，點擊取消按鈕即可取消。</template>
                        </Panel>
                        <Panel name="2-5" id="qa">
                            Q：我可以提前到達網咖嗎？
                            <template #content>A：是的，您可以提前到達網咖，但請注意您的預約時間，您的座位將在預約時間開始後保留一段時間。</template>
                        </Panel>

                    </Collapse>
                </div>




                <div>
                    <div id="qa_title" class="member_benefits_title">
                        漫畫預約相關
                    </div>
                    <Collapse accordion v-model="value2">
                        <Panel name="3-1" id="qa">
                            Q：漫畫租借的費用如何計算？
                            <template #content>A：漫畫租借的費用根據租借期限和漫畫的定價計算，您可以在租借過程中看到相關費用。</template>
                        </Panel>
                        <Panel name="3-2" id="qa">
                            Q：我可以同時租借多本漫畫嗎？
                            <template #content>A：是的，您可以同時租借多本漫畫，請在租借過程中選擇您要租借的漫畫。</template>
                        </Panel>
                        <Panel name="3-3" id="qa">
                            Q：漫畫租借是否有逾期費用？ <template #content>A：是的，漫畫租借有逾期費用，具體費用和逾期時間限制根據漫畫的租借政策而定，請注意遵守租借期限。</template>
                        </Panel>
                        <Panel name="3-4" id="qa">
                            Q：我可以提前歸還漫畫嗎？ <template #content>A：是的，您可以提前歸還漫畫，您將不再被收取租借費用，並且釋放該漫畫以供其他會員租借。</template>
                        </Panel>
                        <Panel name="3-5" id="qa">
                            Q：是否可以續借漫畫租借期限？
                            <template #content>A：根據漫畫的租借政策，有些漫畫可能允許您續借租借期限，請在租借過程中查看相關須知。</template>
                        </Panel>

                    </Collapse>
                </div>
            </template>
        </Panel>
        <Panel name="2">
            會員條件
            <template #content>會員等級制度 <br><br>
                分為多個等級，包括普通會員、高級會員，消費買1元可獲得1點<br><br>
                ◆集滿2000點可升至白銀會員<br>
                ◆集滿5000點可升至黃金會員<br>
                ◆集滿10000點可升至白金會員<br>
                ◆集滿20000點可升至鑽石會員 <br><br><br><br>

                高級會員享每月1日發放折扣券優惠<br><br>
                ◆白銀會員享100$折扣券<br>
                ◆黃金會員享200$折扣券<br>
                ◆白金會員享300$折扣券<br>
                ◆鑽石會員享400$折扣券<br><br><br><br>

                會員權益<br><br>

                所有會員都將享有以下基本權益：<br>
                ◆可以使用我們網咖提供的設施和設備<br>
                ◆可以使用網咖提供的互聯網服務和軟件應用<br>
                ◆可以享受舒適和安全的環境<br>
                ◆可以參與我們網咖舉辦的促銷活動和特殊活動 <br><br><br><br>

                會員義務<br><br>

                所有會員都應遵守我們網咖的規定，包括但不限於以下事項：<br>
                ◆尊重其他會員和員工。<br>
                ◆不干擾他人使用網絡和設備。<br>
                ◆不從事非法或侵犯他人 <br><br><br><br>
            </template>
        </Panel>
        <Panel name="3">
            打咖 DAKA 使用規則
            <template #content>
                １.以下情況禁止使用<br><br>
                ◆如果您被判定為醉酒或處於類似狀態<br>
                ◆18歲以下的使用時間為7:00 ~ 22:00<br>
                ◆18歲以下使用包廂式空間須於22:00前離場<br>
                ◆禁止寵物一起進入和使用。<br><br><br>

                ２.店內嚴禁以下行為<br><br>
                ◆攜帶刀具、易燃物等危險物品<br>
                ◆打擾其他顧客的行為或大聲喧嘩<br>
                ◆惡意更改電腦設定行為，如有損壞照價賠償<br>
                ◆惡意損壞店內設備，如有損壞照價賠償<br><br><br>

                ３.以下情況，我們將當場報警。<br><br>
                ◆商店和停車場內顧客之間的違法行為和糾紛。<br>
                ◆店內物資發生偷竊行為時。<br>
                ◆當您故意損壞商店內外的設備時。<br><br><br>

                ４.對於本店的任何盜竊或丟失，我們概不負責。請您自行負責管理和保管貴重物品。<br><br><br>

                ５.對於您個人在網路上的帳號資訊本店不負責保障，請自行管理。</template>
        </Panel>
        <Panel name="4">
            漫畫租借須知
            <template #content>
                打咖漫畫租借規定（2023年06月30日）<br>
                一、借書資格<br>
                凡持有打咖會員者，均可至打咖櫃台辦理書籍借閱。<br>
                二、打咖會員資格辦理<br>
                請至打咖官網進行「打咖會員註冊」。<br>
                三、借閱期限規定<br>
                （一）一本書籍借期三日，每多借一本則借期延後一日。<br>
                （二）書籍借期皆無法續借，到期時需重新預約租借。<br>
                （三） 預約書籍其保留時間為三日，超過三日還未到店取書時，系統會自動取消該筆預約。<br>
                四、無法預約的可能原因<br>
                （一）借閱帳號有逾期畫籍尚未歸還<br>
                （二）借閱帳號已被停權<br>
                （三）欲借的書籍已有人預約<br>
                五、歸還書籍說明<br>
                可至打咖櫃台進行書籍歸還。<br>
                六、書籍損毀及賠償<br>
                （一）請至打咖櫃台辦理書籍賠償手續。<br>
                （二）書籍借閱未於期限內歸還者：每冊逾期 1 日罰款 1 元，依此類推。<br>
                （三）毀損、加註書籍者：<br>
                賠償以賠償原借出之書籍為原則，並以正版為限，賠償相關事宜處理完畢後，始可辦理歸還手續，其賠償依下列標準計價<br>
                1. 可再次購買之書籍，依再次購買之書籍定價計價。<br>
                2. 無法再次購買之書籍，依書籍定價之 50 倍計價。<br>
                3. 套書書籍，以平均單價計價。<br>
                4. 讀者因上開情事，賠償金及收據已由本館依行政程序繳納市庫入帳後，不得請求還書、退款。<br>
                （四）可免除其賠償責任之情形：<br>
                打咖從會員提供相關文件及照片佐證認定打咖會員已盡借閱者保管義務，然因自身無法避免的意外事故而致書籍受損。<br>
                （五）偷竊、污損、毀棄本店所屬設施、設備及各類型書籍資料者：<br>
                視行為情節暫停其閱覽資格或註銷借閱權利外，必要時並報請警察機關究辦犯罪行為，或責令將所偷竊、毀棄損壞本館所屬設施、設備及書籍恢復原狀。<br>
                （六）會員賠償責任歸屬問題：<br>
                讀者為無行為能力人或限制行為能力人時，以行為時有識別能力為限，與其法定代理人連帶負損害賠償責任。行為時無識別能力者，由其法定代理人負損害賠償責任。<br>
            </template>
        </Panel>
    </Collapse>
</template>
<script>
import PageTitle from '@/components/PageTitle.vue';
export default {
    data() {
        return {
            page_title: '會員相關',
            value1: '0',
            value2: '0'
        }

    },
    components: {
        PageTitle,
    },
}
</script>
