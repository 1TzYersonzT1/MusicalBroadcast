<div class="min-h-screen gap-5 text-white py-4 flex-col">
    <div class="col-span-8">
        <div class="col-span-8 text-center">
            <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
                <span class="top-5 mb-2 text-4xl font-bold">Agrega el nombre del artista</span>
            </div>
            <div class="flex justify-center mt-5 ">
                <input type="text" wire:ignore wire:model="nombreArtista" id="nombreArtista"
                    placeholder="Escribe el nombre del artista" autocomplete="off" maxlength="30"
                    class="bg-white h-14 px-5 w-96 focus:outline-none rounded-full text-black text-center">

            </div>
            <div class="mt-5">
                <button id="confirmarNombre" class="bg-white text-primary py-5 px-5 rounded-full">Continuar</button>
            </div>
        </div>

        @if ($nombreConfirmado)
            <div id="contenedor-nuevo-artista">
                <div>
                    <div class="bg-black bg-opacity-20 px-2 py-1 text-center mt-5">
                        <span class="mb-3 text-4xl font-bold">Escoge uno o más genero</span>
                    </div>

                    <div class="swiper-container swiperGenerosArtista mt-5" wire:ignore>
                        <div class="swiper-wrapper">
                            @foreach ($generos as $index => $genero)
                                <div class="swiper-slide flex flex-col items-center">
                                    <div class="flex items-center genero">
                                        <input type="checkbox" value="{{ $genero->id }}"
                                            wire:model="generosSeleccionados.{{ $index }}"
                                            class="opacity-0 absolute w-32 h-32 rounded-full" />
                                        <div
                                            class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
                                            <img src="https://www.metro951.com/wp-content/uploads/2015/06/Genero.jpg"
                                                class="rounded-full w-28 h-28" />
                                        </div>
                                    </div>
                                    <span>{{ $genero->GEN_Nombre }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>

                </div>

                @if (count($estilos) > 0)
                    <div>
                        <div class="flex flex-col justify-center my-4">
                            <span class="text-2xl font-bold text-center mt-4">Estilos</span>
                            <span class="text-center">
                                Por favor selecciona uno o más estilos que representen a tu artista
                            </span>
                        </div>

                        <div class="flex justify-center flex-wrap">
                            @foreach ($estilos as $index => $estilo)
                                <div class="flex flex-col items-center">
                                    <div class="flex items-center mb-2 genero">
                                        <input type="checkbox" value="{{ $estilo['id'] }}"
                                            wire:model="estilosSeleccionados.{{ $index }}"
                                            class="opacity-0 absolute w-32 h-32 rounded-full" />
                                        <div
                                            class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
                                            <img src="https://novutrefall.org/wp-content/uploads/2019/06/music-genres.png"
                                                class="rounded-full w-28 h-28" />
                                        </div>
                                    </div>
                                    <span>{{ $estilo['EST_Nombre'] }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Tipo artista-->
                <div class="col-span-8 justify-center mt-5">
                    <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
                        <span class="mb-3 text-4xl font-bold">Cuentanos ¿que tipo de artista eres?</span>
                    </div>

                    <div class="flex justify-center gap-5 mt-5">
                        <div class="flex flex-col items-center genero">
                            <input type="radio" wire:model="tipoArtista" value="1"
                                class="h-32 w-32 opacity-0 absolute w-32 h-32 rounded-full" />
                            <div
                                class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
                                <img src="data:image/png;base64,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"
                                    class="rounded-full w-28 h-28" />
                            </div>
                            <span>Solista</span>
                        </div>

                        <div class="flex flex-col items-center genero">
                            <input type="radio" wire:model="tipoArtista" value="2"
                                class="h-32 w-32 opacity-0 absolute w-32 h-32 rounded-full" />
                            <div
                                class="bg-trasparent w-32 h-32 flex rounded-full flex-shrink-0 justify-center items-center mr-2 focus-within:border-red-500">
                                <img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoGBxQUExMUFBQWGBYZGBocGhoaGhYcHxofGBYcGR8fGR8dHysqGhwoIBwfJDQjKCwuMTExHyE3PDcwOyswMS4BCwsLDg4OEA4ODy4bFhsuLjswLi4wLjAwLjAwMC4uLi4wLi4uMC4uLi4uLi4uLi4uLjAuLi4uLi4uLi4uLi4uLv/AABEIAOEA4QMBIgACEQEDEQH/xAAcAAACAgMBAQAAAAAAAAAAAAAAAQYHAgQFAwj/xABJEAABAgMEBggDBgUCBAUFAAABAgMAESEEEjFBBSIyQlFhBgcTUnGBofBikbEUIzNyweFDY4KSs6LRFSRzsrTCxNPUFlNkg6P/xAAVAQEBAAAAAAAAAAAAAAAAAAAAAf/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/ALb26mkvWAm9rGhGXGVYCb1VapGGU/nCJnrKooYDjKv1gHOevgRlxh/Hn3fSFOesaKGA4+WMKe9v930wxwgMpy18zlC2dcVJy4TrBPe3u7+2MKctYVUcRw8oBg3dYVnlwzhjUwrP09zhTu1TUnEYy+UA1dnWnjnL5QDAu6orPPhlCAu6mIOfCdIBq0TUHE4y+UApqiqTieHnAOUtTI5wpbmXe9YXwjZ7374QfDud71xwxgHKepgBnxgle1TQDPjKkLHVNEjA8fPCDHVVRIwPGVPpAZEX6GkvWFt1NJesB1qK1QMMp/OCd6qtUjDKfzgAm9rGhGXGVYJz18CMuMImesqihgOMq/WHOesaKGA4+WMA/jz7vpBOWvmcoxnvb/d9MMcIc97e7v7YwBs64qTlwnWAG7rCs8uGcKctYVUcRw8oc7tU1JxGMvlAMamFZ+nucAF3VFZ58MoQ1dnWnjnL5QDVomoOJxl8oAAu6mIOfCdIcpamRzhCmqKpOJ4ecL4Rs9798IBy3Mu96wSnqYAZ8YXw7ne9ccMYMdU0SMDx88IB/ZR3oIOwR3vUQQAa7dCMOcBrVVFDAceHrDPx47vsQj8W3u/phzgHzO3kIOe/w98oPHby94Qv8nvywgHzG3mIWFU1UcRw4+sHht5+8IX5dve/XGmMAxSqaqOI4QxTYrPHl7rC/Jtb3s84B/L/AKvZ84AFKJqk4nhCFKJqg4n6+kA+DZ3vZ5QD4dje/XGuEA+Q2MzBy3OPvnC8Pw8/eMP/AB+/PGAOR2MjBjRVEjA8eHpB47GXvGF+bY3f0wrhAM126AYc4DXboRhzgP8AMw3fYg/6mO77EAGtVUUMBx4esPmdvIQj8W3u/phzh+O3l7wgDnv8PfKDmNvMQv8AJ78sIPDbz94QBhVNVHEcOPrAKVTVRxHCF+Xb3v1xpjD/ACbW97POAYpsVnjy91hClE1ScTwgH8v+r2fOEPg2d72eUAClE1QcT9fSHyGxmYQ+HY3v1xrhFcdZnSq2Wa0Jbs7nZNdmFCbaFBwlRvGa0nCgkD9RAWRy3OPvnByOxkYr/oR02tTob+1NpU064tpC2k1DiG+1koBVQpN6UgJXDOhET1l28JlKkoyChI/7wGfZt971gg+693oIBmm3U5Qj8W1u/p6wbNF1Jwzl84DSiqqOB4cPWAfI7eRhct/j75QYapqs4Hh5wvh3+964+EBlyG3mYXJO3mfr6wfCNvM/vCx1U0UMTx41gGPhore9+MArsU73v5wY0TQjE4TgGtsUljlP5ecAD4aJ3vfhCHFOxmPr6QwZ1TQDEcYBXWTRIxHGAOY2MxBz/h8PfOD4hsZj9oXxbnd9MPGAfM7GQg5q2d39PSFOWsaoOA/aHhVVUnAcOHpAM026jKA026nKETdquoOGcvnBs0XUnDOXzgA/Ftbv6esB57eRgNKKqo4Hhw9YhfW7pJxmyobSqRdcuqUJzuBJUQDlMgT5TgO0rphYQopNqZvgyKr2r/dsmmc6R2ErmBdIKiJzGBBrQ4YR84gxavU3b1rs7zJ/hLSUEzolYJKZ8AUky+LwgJ3yTt5n6+sA+Git734wsdVNFDE8eNYeNE0IxOE4AFdine9/OAfDRO978IBrbFJY5T+XnADOqaAYjjAIcU7GY+vpFV9dTgL9nSlQkGiQnNN5ypPJV0S/KYtUVqmiRiOMUJ0xt6n7baFqJ/FWlIO6lslAAGWGWZJzgJD1U6NefWoqfWlizr7RKUhs/erbLcxfSqgQVTymQcaxazDZSnXWVpyJCQfO6AOOUVJ1OaYDVoUyvYfFPzthShlmm9WYwHGLenLWNUHAftAO83w+sELtkd30H+8EBkdWiqzw5Qjq6pqTgeE6Q5XKYz9IUrurjez4TpAEpapqo4HhB8G93vWCUtTGefCCX8P/AFesAS3d7vQY6ooRieMqQSnqcN71gle1MJZ8ZUgDaoKEYnjGDTyXJ3FDVxkQceMvdYg/XVpNaLI2ymaQ47dWRvIShRKTyJuz4gEZxUNitS2Vhxlam1pwUgyI/wBxxBoc4D6aBvVFAMRxhAz1hQDEcZVjk9ENKqtdjs9oVIKKNeQkCpCilUq0F5J4x1p3tfCWXGVYAnv7vdgnv7vd9IJz1+G76QT/AIn+n0gCctY1ScBwgnd1jUHAcJ1gnLXxnlwgnd1sb2XCdYBk3aqrPDl84RF2itaeHL5w53K4z9IQFym1P0gOa9plIUtptDj7qNoNpBCTKd1TiylCV4G6Vg1BlHI6UaFtNuY7FTLTYCkrStx0qWhQ+BDagQUkp/EzzjtdE5JaWzQKaedQsDipZdSo/EtDiVnms44x1X3koSpSiAlIJUTgABMk+UB8+6c6N2myS7dq4FEhJvoUFXc03TMDxAxjHQXSC02VRLDhRMi8mQKVSnK8D4nCRjHpHpZVqtDtpUCL51QcUoFEJ5SGMqTKjnGjEF79E+kLduYC29RaZBxPdVITE95JnMKz8QQOuBeoKEYnjlFMdWWlSzbENlUkPfdqrS9Utnmb2qPzmLole1cJZ8cooQ1tnVljz+XhDBvVFAMRxjT0zpANMvPqBk0hSykSmqQnITlImUvOKet/WBb3HCsPlsTmlCEoup5VSSr+qcBdgM9YUAxHGVYo3rHaQjSNpuCQosilFONoWcOJJPnE16AdOl2hwMWkguSJbWAE37oKilQFAqUyCBIyNOMG6xrQHNI21QprIT/Yyhs+oMBodHHy0/ZlgyuutnyDgmPMTHnH0Kaaxqk4DhHzb2xQm8naSLwpOqRMUzrH0iDLXxnl4wD+0p7v0gh/a/h9f2hQDAu0TWePKFK7qioOJ4TpANXYqDjnL5QYUTVJxPDj6QBKWqKpOJ4QS3N3vesKUtUVQcT+8Hw7ne9cfGActzd70BE9U0AwPGVIPhOxkf3gUaSVRIwPGX7QFZdd+lWlIYs4UC6hwqUBW6m4U63AkkGXKfCKvj1tdtU8tbyybziitUzOqjOU+U5eUYoAJF6cpid2U5Z3Z0BlhOkQXZ1d2ptrR9kS7fa1CpKnBJC+0cKwQuqReKqJJCjPCJUX0lciZOBN4J4gGU/mZfPgY5TGk7L/AMNS805/yzbSZFRUTdaISULzKjduEGZJOBwNSM9I3V2r7lTlmYdUhoNspUShoKklKEo1gqpP3ZBvKVLGUUXoTvbw3YPj3u76RDNN9MbVZENvPWEFCgJKDt0pJwDqLi+zUeS1DKc6R0+g+nXrY0u0uNobCllLSEkqJCNVSiTjWYwGyeMBIJy1hVRxHCAausKk4jhOsGGsKrOI4eUApVNVHEcOPrAAN2qdaePL5QwLtE1njy+UYKWEAqBHFU8EyrXgPGOY1bHH6WTVaMp2hYmlQ/kIp2lP4h1Kgi/UQGu8BZre24CeytaQ04ckutglpXK8m82eYaEcfrh6QhtgWVCvvHJFYE6NVxPxKAEswFRhpd9FmsdtaeL7ig/MqJC1oLklMOpvqSLoKEylq30qEhIgVjpO2F55x4ghTqr6gTOSlAFQBzSDRPwhMBrwQQog3+jhP2uyyx+0M/5kx9AkXqGgGB45RRvV5o/t7ewN1tXarM5SDdQf77glzi8SJ0VQDA8Yo5HTWxqfsVpbA1uzJQO8UELAHMlIHnFDgx9H7W3qywyn8/KKW6zNDtWa0js1VdvOKap91MiUuCVEqIBwunKUByejVtSzarO6syQhxKlGRMgDWgqaRztM2ztXrQ7M/ePOLrjJThUB8o8iqNRRiDYdVqkcj9I+kdHmTTSxMkoRTMTSMY+bbDZC4qUlFtMlOqCVK7Nu8lK1qCa3UhUz+kfSrCk3UrbIM0iQEiLpAkUyylKKPX7Sru/WFD7Zzu+h/wB4UAxTYqM4XJOzvfr6QD4MN72YX5dje/XGuEA+Q2MzBy/h8ffONbSFvaYQXHHENtDaUtQSJnKZrM0kBjEQt3W3YEKuoS+6j4G0pH/9VoOPKAnHI7GRhETorYy58PSII11vWJV683aUpAokoar4FLhr4kRoPdcaLwCbIpSJ7zqUqHkEGZl8UBV62CglBxSSk5bJlhlhDSmNjSL6XHnnEghK3XFpBqQFLKgCcyAZeUeQiDof8ce+yfZJjse07XnO7K7PuT1pSxzibdUfRIlSLe9MSn9nTUXpgpLivhIJCRnVXdivEISSAsqCSReKZXrs63Z0nKcpx9F6NLfZNdmQU9mjsiMCi6LkssIoekrEh5pxp1M+0SUlPEESpwOYORAjHRGj02dlplvFtCUAcbolM8zieZja8dvL3hB/k9+WEBCes7pS7ZQ00yq464Cpa5AlKQQJJnQFRnXIClTMV1Y+ktracDiLS9enPXcWsK5KSokKHukTHrosRvWd/KSm18lbafGYv4d3nEAstmW6tLbaSpayEpSMycPAc8hMxBe9m7O2WRsqbSpD7SFONmo10hUvIn0jAaKW1r2V50yqW3XXHEK5TcKlN8ikyGJSrCNvRNhDDDTLZn2aEIJOdxITOvhG0P5eG97MUVn1kaTTa+xSkNJbSoJ7RaSpxD5vpUwq5O5IBN6QNSnGk4jp3o5abIR27RSCZJWCFJUZTooZyrIyNDSLHt3R1dotdpSy86ykLbc7ROCFLZSlQbEwe0XcQSonVCafiKnxuuHT6i4ixJ2EBK1qOK1EG6OQAqeJIwu1gr2Btla1JQ2kqWogJSMVE4AQRKeqdbY0gi/KrTgTPvSBpzuhXlOAsHoH0UFiYk5dLrklOLTxA1UJOJQmZqcSSaTkJIfiond9+EI/Fsbv6YVwhy7+zu+xyiit+s/pu624bIwooUkDtXE0ULyQoJQd03SCVCtZCUVk44VEqUSpRMySSSTxJNSeZjc0/bS/aLQ8TO+64oH4Ss3fkmQ8o04gxVgY9dA6Hdtb7VnalfXOqpySEgqUpUsgB5mQzjwdwMTLqPZvaSUckWdw+ZcaSPQmAs/oj0Ns9haLaE31rEnHFATc5S3UcE4cZkknV6EILQtNkFTZX1IbmZ/dOIS60DPuhdz+mJbEa0Umdv0ipBrOzpPilkqPndWj0ijt3nOH0ghfe+7sEACuxQDHnGD76UIU4VBDSASsmgAAmSeUozGtVOqBjlP5RVPXX0nvKTYW6JAQ47IiSjMlCCBwkF/2wET6ddKl260KVMhhBIabwknC8od9WJ4UGUcECEmPRIiBSj0Aie9S2gO1tC7StM22QUpngXFpl53UE0I30EYRZK+hGjyq99jYnyQAP7RT0gKFY0Q8phy0hB7BC0oK8ryjKQ41kDLAkcY10xf3TTRiTo21MtNpSlLKihCEgAdnrpCQJAVTQRQKRAZpEWv1O6avsuWZVVtGbZPcWTT+lc/JaRlFVCJN1Z23stIMYSdC2ieF9N5Mud9KIC7OR28jFf8ATTrFLK1MWYJLqSUrdNQkihSgbxGBJoCCJGJd0mt5YstocH4iGllKuBlJNTzlFBSijZ0jpF59d951biuKiTKfdGCRTAACPOw21xpxLrSihaDNKhKYoRnyJHnHitQAmSAOcbA0a+ReFntBTTWDLpFaCt2VYgkui+sm2tHXWl5M6hSUpMuAUgCXiQfOLP6O6eZtjYcZMpbaCReSeBHDgcDFCWlKm1BLiVtqOCVpUknwCgI2dE6Ucs7qH2jJaKitFDNKvhOBEBelltKWrS4hWqHylTZNApaEBC0A4XglCVATmRfIGqqIF1zaKQh5p8LF5wXVNzF7UFFgTmUykk0kCE8Ysh6ztvNyUhKmyAVIUAQcFVGB/aKC00sm0PmZP3rgEyTdSHFXUiZJupFAMgIo049dGaQLD7L4n904lchmEqmU+aZjzjxUY8VxB9KpWJBRqgiafOo9IeG1UHZ5RxOgyl/YLIpwKo0lN1QM9TVSZHikCvOO2dWqqg4Dh84o+aUslGoraTqnxTQ+ogMdrpxo/sbfam5fxSseDknRLiBfl5RxTEGDmHmPrFi9QrP/ADFtV3W2h/epZ/8AJFdry8f0MWd1CSnb+M2ZmWUnZVzrP2YCzrU+ltC3FqCUISVKUcEpSJknkAIj/QkqWwbQoXXbStT5B3UOSDaTzDSWx4zjLrHTOwOpJkha2UuEZNrfbS4eQuFUzkJmOylI2E0IzFKDKKMuzc73v5QQfZ1971MEBq6Q0ghtpbyzdQ2kqVzAE5DnSQHOPmu22pTzrjq9pxalqrORWoqIHITlFyddmk1JsKUAS7V1KDUzupBcMvNCQeSjFLCAzSI9G0zIAlMmQvEJFaaxOyOJNBGAjMRBZo6wLNo+yt2WxAPuJBC3CFIbLm+utXJqmRd1ZSkqkRx7rB0q7edS8tKEkBRbaR2aCZSBJQZEzEgonER0urDoE3bAq0Wi92KVXUIBKe0IE1FShW6CZapBJBrISNsP6EZVZl2UNpS0pBRcSkAJBG6BgRiDxrFER0Pp60WyxWVxT3YzfLL60JbKlXgUN3Q4hSRNamwRLMylhFX9I9Dmy2l6zmZ7NUkk4qSQFIPM3SJyznwi1+rzo44izMds4hSEOKcShCVCawpSQpxRUb4EgUpCUyIBM5CWh1z9HL7aLYgazYCHOaCrVPMpUfko8ICqxHQ6OtBVqsyVKKQp9oEhSkkAupwUkgpJyIIINY54MbmhUXrRZkjFTzSR/U6kfrEF32noTZXElLn2laTiF2y2qB8QXpGIdpjq+srjirPYm1l0H711biy3ZwRMAj+K5IghueEiogEXpv0m0i4nsrOyZPvqKUKkD2aEibjpBobiSJA0K1IBoYivTfpQnR7abFY6O3ZrWdYovVKlE7TyySokzNbxnMRRlZtD6J0VdLyg4+JEFc3HAakFDYEmhjJUh+Yxja+uBkfhWZ1X51IR/wBt+KsccKiVKJUomZJJJJOZJqTzhRBazPWjYnx2dpYWlCsbyUOol8QxPkkx5udXWjLaku2R1SAZghpSVIBIwUhYJRLuAp8IqyNzQ+l3rM6HWFlCx8lDurG8nl8pGsBcVm066062xb0IaUo3WnkT7F45I1jNp0jcVOcjInCKY0m7eeeUN51Z+ayYuOyaXs+ldHvhTYKg2Q40alCwkqSUmhlMTSoSwyIIFHpVQeEBkZ8zyAJJ5ADE8ouboP0GasjaHnkpctBqSRMNk7rc8CMCrE1wFIq/oTZg7b7IgiY7VKpceyBdl/oi/py18zlFCJu65qDlwnWGTd1jWeXDOFs64qTlwnWAausKlWXDOAqLrlspRbW1ZLYRXmlxwH0uxCFRMetfSaHbYENqSpLSLhUkg65USpMx3aDkbwiHKMQdTRHRhy0XblosiFEE3HXghchITKUpUUzvTE5TFcJTuPq+6J/YGFIUoLdcXfWpM7ooEhKZ1IAE5nEk8gIH1W9K20LRZbURdN9LSlyKQVlB7NU9kTRNOMysimqDckUcXpXpSzssqTaQVpdm0lpKStbpUJXEJFVEjyGZEeHRBq0CyMN2mj6USWZhRkCQkKI2l3Lt4ihVONTQzSbTa7Tal17NxdnYJwQhqjqkg763b6SruoQPGQynqYAZ8YB/ZT3vr/vBC+yDvQoCA9ebCl2NlyUuzfTPHZW2tM/7ro84p1EfSPSPRKbXZnbO7q30ySeCgQpKuclAGKF070StdkKu3ZWEJl94kXmyCZA3hMJmaSVIzIGYmHLjNMec4AqINywaQeZUVMuuNEymW1rROWF66ReHjEy6P9a1rZkl4JtCPikhY8FJEj4FMzxEQRBnelWQmeQJlM8BOMwYC9OjtlsdsYLtletLc7wITabQFMrVMkdmXFISROYF0pwImDHM6W6Pcs9jtCHnnbQ2ttwIcWtYWhaUFaQ4kG4tBumSgE1CUkKvTEY6lbeUW5bU9V1pQlxU2QpPySXPnE563rShOjXUqlNxbSUgmU1BxLlOJAQVS5RRSAMd7q9sxd0jZEgTk5fPINpUuZ80geJEcCLE6jdFFT9otJFEIDST8SyFr8wlKP74gnDFoSH9IWxzZYSGknghpsPuFP5lLunj2SeEUfpC3LfdcecM1uKKleKjOQ5DAcgItLTFoUNE6TVvG12hJ8DbS3/2SioyqAzBhkx5hUF6A9JwTjCcBMB1+i2nlWS0JdEyg6jqe82qivEjaHMAYExw28ADwEZrwMYJgJZ1TonpFlUplCHVDx7Mp+ijF2T3t7u/tjFJdVNpuaRZ4rS4kePZlVf7fpF3cxt5iKMZy1hVRxHDyiGdbek3GLM2GXFIU47JZSohV0IUopBFRMyn4SziaYVTVRxHDj6xAOu0D7PZyDXtjPl90v8AWAqo08IRMBMealRAlYnwH6xcnUnpRxyyutuKKg0sBBJnJCkghMzkCDLgCBgBFMzi9OqLQhs9hQtRBVaJPU3UrQm4nxuiZ4FRFZTIbHQdUm7SwqhbtdoCv/2PKeQfBSHEkeMd/HVNEjA8fPCInp/SbTdvaVZldq+pTbVrabC1/dXjJxwoBDa2ySRelNJUOEpbyOxkYoOwR3vUQQdm33vWCAZ+PHd9iPC2WVDqFNvISsKErigFJVmARgRPjHuabdTlCPxbW7+nrARO36DsCF9i1oyzO2i7euBtlKUJMwlTqykhAUQQAApRkZJIBI4XRhmyNNrFt0bZw2LS+32/ZsuobItC03HCUBSG0nUSuV2QE7mAlvRcTd0gpVXDayJ8kMMpSPAD6mF0esqFt2tpaQq/abSFJIoQ44SoHiCFEQHcsei2Wmy02y222ZzQhCEpN7GaQJVil+tXoo3Yn21si6y8FEIrJtSLt4AndN4EDLWAoABbHQl0mxtJJJLZcZmozKvs7q2Zk5k9nOfOOV1uaK7fRzqqXmSHhPggEL/0FXmBAVl1WAnSlk5F3/w7kSXr10pNyzWYEaqVOrHNRuI8KBfzEQzoHa+y0hY1yn96lEv+rNonyC5x6dYGlDaNIWlc9VLhaRyS193TkVBSv6og4alyBJwAnH0J0B0GLJYmGt8pvuc1r1leQndHJIijeieiftVss7EppW4CulOzRrrnwmkFPiRH0lFEJtGji6nTNhG0sh5sHg80Cny7Ztz2YpQH3/vF/wDSYFhxu3JBIaSpD4E5llZBKpZltQC/y9oBUxW/Wt0V7B02tkTs7yryimoQtdZ03FkzBwvEjNIIQicE4xnBOIMgYc4wnCnAe9msynVoaRtOKShP5lqCR6kR1Om2jU2e3WllAklKwUjgHEJcAHIX5RLepzoopbgtrqZNomGQd9RBSV/lSJgcSSaXRPV6z7Cq0Let7IH2dpSGFK76klQW4PgStSWvFJyEBDLDbFMOtPI2m1pWnmUqnI8jKR5R9D6PtiHm23mjPtEJWDyUARywj5tK4tbqX0/2jTlkJ+8amtuZxbUdYV7qz8lpGUUWF+Xb3v1xpjFbdeNoAFkbGJLq1Y4pCEj/ALjFlck7eZ+vrFRdd1ona2Ed1gK81urB/wAcBBSY8lmGox5qMQerTKnFJbTtLUEJ/MshI9SI+gultpVZ7Glpg3HFqas7SgNguKDd4flTeV/TFN9Wlg7bSVlTKYSsuK5dkkrSf7wkecXB0mIctej2MbrjloXyQ00ptM/Fx1MvA8Io6GiNFs2dpLTKAlocMVHNSjipROJNTG547GXvGDn/AA+HvnBzOxkIA+693oILzfD6wQBs0XUnDOXzgNKKqo4Hhw9YZ1aKrPDlCOrqmpOB4TpAcPo3q2jSbZ2vtSFA/nsbBx8QY6Gj7D2ReF6anHVOAyldvJSCJzrsmshj5x52CxKbftJI/FLZSqkyUtBBnmJXRDtv2kLutdiRLFZcCp44pBpAePQcSZfRmm12sf3WlxY9FCO262FJKVCYIII4giREQ/Qlh0pZ12gf8m6HHVugFbyLpXKYmGlTTQZTnOtZDoptmlCSOwsMx/8AkWj/AOPAUnpiyGw29xsYsPJUifBKkutzOZu3ZnjOOUt0qJUTMkkk8yZmJv1u6OtRcbtb7bCEySzJpxxw3h2rgKrzaKSBHlziCA0iC3upToyW2121YF50FDYzS2lWsTzWpI8kpOZEWXFf9X+nLYbGy2jR5uNJS3ecd7IruoBvJSpuqTPGfziQI0za5E/YTIZh9k5c5RR3yIh1pbNgSttxsvaNUDMXb6rKDtJUmpcs9TKQJQKVTKXSOnrSBP8A4c8R8L1k/V0QDpE/KZ0bapcnLCf/AFEBANPdV3aJ7fRzqHGli8lsrBp/KcmQsYCSpSrrGIbbujFsaJDlltAliQ0taf70Ap9Ys+0WIoUp2yWPSFjWozV2RsSmlni4ybQUk02khKucLSXSDS4bUhNiDhUhQDkg1dJFCW+1WD5LyOEBV+jOjlrfl2NmfWFCaVXFJQoHAhapJIPjE+6KdU0iHbepN0V7FBpT/wC4vhyT/dKYjb0BpjSjNmaYVY+z7FCG0rKFOlSUJCQbiXECch3sa8o2pB0g25vSNow+7UwG2Zj+U2rXE8nFLgOlaNIqtv8Ay1gNyzDUdtSKJCRQt2WW05IS7QaqBhNUgJFZdHNNspYQ2kNJRcCJTTdlKRBxEsZ4xxh0tbQAn7JbUgUATZHyABQAXUkSjP8A+tGc2LaPGxWv/wBuAqfrM6FmxO9q0kmyuHVOPZKP8NU6yzST4YiZj/R/TC7LaGrQ3OaFTIBlfSaKT5pmK4GRyi8NI9JbG+2tl1q1KQsEKSqx2zA+DUwcwRUYxSPSHRX2d5aUdqpqf3bjjTrJUCJyUHEJ1xgZCRlOk5APoew2tDzaFtKmFpSsK7yVAEH1EVf14WCT1ntAFCgtKNJXkKUtPzCln+kxl1T9Mm22jZH1lJCipkhK1khU1LRJAJoZq8Ce7Eg6eaZafsymEWS1vlZI+7YtCC2pFUrmtsYKGFZ4SIJgKUKoxJja0joy0MXe3YdavbPaIWicsZXhWNSIJr1U6RasztotLgUpSW0tNNoF5bqnVXrrac1fdiZwAVWU4tPo1YHh2lqtN3t3pX0JMw2hE+zaSd67eJKs1KVlKI31MaCbRZPtZQkuuLckogXghJCLqTkklJJ4z5CJ9Pf3e7FC+Lc7vph4wTlrGqDgP2hz393u+kE5axqk4DhALtkd30H+8EP7Snu/SCAcrlMZ+kKV3VxvZ8J0hgXaJrPHlCld1RUHE8J0gCUtTGefCCX8P/V6wSlqiqTieEEtzd73rAEp6nDe9YJXtTCWfGVIJbm73oCJ6poBgeMqQHF6b6JNrsVoYA1gi8jGq2zfSKcSkDOhMfO6UFYCUYronxVQepj6j2qGgGB4x816aaCrXaETDaTaXUzlRAL6kzl3UjLgID6RabF1IFAgAAcQkftGU72vhLLjKsedmbIQgKNUACs9aQFakmsuJj0x1jQjAcZVgCc9fhu+kE/4n+n0gJ3t4bsHx73d9IAnLXxnlwgnd1sb2XCdYJy1hVRxHCAausKk4jhOsA53K4z9IJXKYz9IQN2qdaePL5QwLtE1njy+UApXdXG9nwnSCUtTGefCCV3VFQcTwnSCUtUVScTwgD+X/q9Y53SHQrdrYXZXdk1C80qFUqHMHnUTGcdGW5u971glubvegPnZYd0bbxe/Es7oNBtp4pnkttX+qPoSyWhLyELQrUUlKkqG8lQmD5isUn1yWpC9JKCK9k022v8AMCtfnqrSPKWUWN1SuKc0XZwskBJdSknNKXlpA8ABLygJLbbGi0ILbraFIzStIWD5ESiFaa6qLI8FrZK7OvEAG+3OR3VVAPAKHLhE7OttassOfz8ICb1TQjAcc4Dn9G9GfZ7Mw1OZabSg0leKRNShwmSTKOhOevw3fSDHWNCMBxlWAne3huwBP+J/p9IJy18Z5cIPj3u76QTlrCqjiOEA/tfw+v7Qof2lXd+sKABq7FQcc5fKDCiapOJ4cfSGKbFRnC5J2d79fSAUpaoqg4n94Ph3O964+MPkNjMwcv4fH3zgD4TsZH94DXVVRIwPGDkdjIwjwVsZH6ekAyJ0VQDA8Yo/rE6IWkW60Kbs7q23V30lttawSsAqBugyN69j4xeB+Kid334QGu3Tu+/lAcjocLT9kZ+2i6+lMiJiZAOqVypfIlOWc462OsqihgOPCkM/FRW778YOatvIfT1gD4jt5D9oXxb/AHfTDwjLmdvIQue/w98oAw1hVZxHDygFKpqo4jhx9YY4jbzhc0bWY984A2aoqTjnL5QAXaIqDjnL5QxTYqc4BTYqM4BYUTVJxPDj6QpS1RVBxP7w+Sdne/X0g5DYzMAvh3O964+MP4TsZH94OX8Pj75wcjsZGAjDvVvo1aypVmlMkzDr4vEmdZLkZ44RIbJZENoS0lKUNIACAkSAAoJR6ngrYyP09IZ+Kid334QAdbbpLDKfz8oMaqoRgMJwGu3Tu+/lAfiord9+MAsdZVFDAceFIfxHbyH7Qc1beQ+nrD5nbyEBj8W/3fTDwh4awqs4jh5Qc9/h75Q+Y28xAHbOd30P+8KHec4fSCAQ+DDe9mF+XY3v1xrhDFdigGPODGqaJGI48fSAPDYz94wf4/fnjBzGxmIOe5w984BeP4eXvGA/Fsbv6YVwh8zsZCEaVVVBwH09IAPx7O77HKGf5n9PseUBpVVUnAcIZpt1nhy90gF+fa3fY5wvzbe7+mFMYZpRVVHA8IMKKqo4Hhw9YA8dvL3hB/k9+WEPkdvIwct/j75QB4befvCEPh2979cecPkNvMwhWiaKGJ48fWAP+njvezAP5eG97MArsUIx5wCuxQDHnAL8uxvfrjXCH4bGfvGDGqaJGI48fSDmNjMQB/j9+eMLx/Dy94w+e5w984OZ2MhAI/Fsbv6YVwgPx7O77HKA0qqqDgPp6QzSqqpOA4QAf5n9PseUH59rd9jnDNNus8OXukI0oqqjgeEAvzbe7+mFMYfjt5e8IMKKqo4Hhw9YfI7eRgF/k9+WEPw28/eEHLf4++UHIbeZgF977uwQ+zc73v5QQCseCvfGCz7C/P6QoIBtfhq84P4XvvQQQAv8Ie84H/w0+X0MKCAdq2U+8odt3fP9IIIBWnaR7zhv/iJ8vqYIIAV+KPeRgH4p97sKCAbX4ivfCCz7a/P6woIB2PFXvMwrFgr3xgggCz7C/P6QNfhq84IIA/he+9Av8Ie84UEA3/w0+X0MFq2U+8oIIB23d8/0hWnaR7zgggG/+Iny+pgV+KPeRgggAfin3uwNfiK98IIIDaggggP/2Q=="
                                    class="rounded-full w-28 h-28" />
                            </div>
                            <span>Banda</span>
                        </div>
                    </div>
                </div>

                <!-- Imagen artista -->
                <div class="col-span-8 align-content-center my-5">
                    <div class="bg-black bg-opacity-20 px-2 py-1 text-center">
                        <span class="top-5 mb-3 text-4xl font-bold">Sube la imagen del artista</span>
                    </div>

                    <div class="flex flex-col items-center justify-center gap-5 mt-5">
                        @if ($imagenArtista)
                            <img src="{{ 'https://musicalimages.blob.core.windows.net/images/' . $url }}"
                                class="rounded-full w-32 h-32" />
                            <svg wire:click="eliminarImagenArtista" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        @else
                            <div class="w-80 flex flex-col items-center">
                                <label for="imagenArtista">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="h-32 w-32 hover:text-green-400 cursor-pointer" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </label>
                                <input type="file" wire:model="imagenArtista" id="imagenArtista" class="hidden" />
                            </div>
                        @endif
                        <div class="flex flex-col lg:justify-between mb-3">
                            <div wire:loading wire:target="imagenArtista" class="bg-blue-100 w-64 text-blue-700 px-4" role="alert">
                                <p class="font-bold  py-1">Cargando imagen</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-8 align-content-center">
                    <div class="bg-black bg-opacity-20 px-2 text-center">
                        <span class="my-3 text-4xl font-bold">Agrega tu biografía</span>
                    </div>
                    <div class=" text-center">

                        <div class="flex py-2 justify-center my-5 gap-16">
                            <textarea placeholder="Agrega la biografía del artista" wire:model="biografia"
                                maxlength="2000"
                                class="border-2 lg:w-96 w-80 bg-white h-48 mt-1 mb-1 text-primary"></textarea>

                        </div>
                        <span class="items-center">{{ $caracteres_biografia }} / 2000</span>

                    </div>

                </div>

                <!-- Integrantes -->
                @if ($tipoArtista == 2)
                    <livewire:representante.artista.crear.integrantes.nuevo-integrante
                        :nombreArtista="$nombreArtista" />
                @endif
                <!-- Albumes -->
                <livewire:representante.artista.crear.album.album :albumes="$albumes" :nombreArtista="$nombreArtista" />



                <!-- Redes sociales -->
                <div class="bg-black bg-opacity-20 px-2 text-center">
                    <span class="my-3 text-4xl font-bold">Redes sociales del artista</span>
                </div>
                <div class="lg:col-span-8 flex flex-col items-center">


                    <div class="my-5">
                        <div class="flex flex-col py-2">
                            <span class="mb-3 text-2xl justify-self-start font-bold mt-2">Instagram</span>
                            <div class="flex flex-col">
                                <input type="text" wire:model="instagram"
                                    placeholder="Pega la URL del perfil del artista de instagram"
                                    class="bg-white h-14 px-5 lg:w-96 w-72 focus:outline-none rounded-full text-black">
                                @error('instagram')
                                    <span class="block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex  flex-col justify-between py-2">
                            <span class="mb-3 text-2xl font-bold mt-2">Facebook</span>
                            <div class="flex flex-col">
                                <input type="text" wire:model="facebook"
                                    placeholder="Pega la URL del perfil del artista de facebook"
                                    class="bg-white h-14 px-5 lg:w-96 w-72 focus:outline-none rounded-full text-black">
                                @error('facebook')
                                    <span class="block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex flex  flex-col justify-between py-2">
                            <span class="mb-3 text-2xl font-bold mt-2">Twitter</span>
                            <div class="flex flex-col">
                                <input type="text" wire:model="twitter"
                                    placeholder="Pega la URL del perfil del artista de twiter"
                                    class="bg-white h-14 px-5 lg:w-96 w-72 focus:outline-none rounded-full text-black">
                                @error('twitter')
                                    <span class="block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-black bg-opacity-20 px-2 py-1 mt-5 text-center">
                    <span class="top-5 mb-3 text-4xl font-bold">Canales de musica</span>
                </div>
                <div class="col-span-8 flex flex-col items-center">


                    <div class="flex flex-col justify-between py-2 mt-5">
                        <span class="mb-3 text-2xl font-bold mt-2">Spotify</span>
                        <div class="flex flex-col">
                            <input type="text" wire:model="spotify"
                                placeholder="Pega la URL del perfil del artista de spotify"
                                class="bg-white h-14 px-5 lg:w-96 w-72 focus:outline-none rounded-full text-black">
                            @error('spotify')
                                <span class="block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col justify-between py-2 mt-5" x-data="{ open: false }">
                        <div class="">
                            <span class="top-5 mb-3 text-2xl font-bold mt-2">Youtube</span>
                            <a href="https://www.youtube.com/account_advanced" target="_blank">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" x-on:mouseover="open = true"
                                        x-on:mouseout="open = false">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                    </svg>
                                </button>
                            </a>
                        </div>
                        <div class="flex flex-col">
                            <div class="flex ">
                                <div>
                                    <div x-show="open" @click.away="open = false "
                                        class="bg-white absolute  p-4 text-primary lg:w-96"
                                        x-transition:enter="transition ease-out duration-300"
                                        x-transition:enter-start="opacity-0 transform scale-90"
                                        x-transition:enter-end="opacity-100 transform scale-100"
                                        x-transition:leave="transition ease-in duration-300"
                                        x-transition:leave-start="opacity-100 transform scale-100"
                                        x-transition:leave-end="opacity-0 transform scale-90">
                                        <div class="mb-5 flex flex-col">
                                            <img src="/youtube.PNG" class="w-96 rounded-full  " />
                                            <div class="flex">
                                                <span>Haga clic en <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />

                                                    </svg>para ir directamente al sitio que aparece en la imagen.</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <input type="text" wire:model="youtube"
                                placeholder="Pega el ID del canal que pertenece al artista"
                                class="bg-white h-14 px-5 lg:w-96 w-72 focus:outline-none rounded-full text-black">
                        </div>
                        @error('youtube')
                            <span class="block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-span-8 flex justify-center mt-10">
                    <button wire:click='validarAgregarArtista' class="bg-white text-primary py-2 px-8 rounded-full">
                        <span class="text-2xl">Agregar artista</span>
                    </button>
                </div>
            </div>
        @endif
        <div class="mt-10 flex justify-center">
            @if ($errors)
                @foreach ($errors->all() as $message)
                    <span class="text-red-400">{{ $message }}</span>
                @endforeach
            @endif
        </div>
    </div>
</div>

<script>
    window.addEventListener('solicitudAgregarArtista', () => {
        Swal.fire({
            title: 'Solicitar permiso para agregar artista',
            text: `Se enviara una solicitud a los administradores
            con la información que nos acaba de proporcionar.`,
            icon: 'success',
            showCancelButton: true,
            cancelButtonText: 'Regresar',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Solicitar permiso',
        }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emit('agregarArtista');

                Swal.fire({
                    title: 'Solicitud enviada',
                    text: `Se ha enviado la solicitud, en cuanto se haya aprobado
                    recibirá un mensaje al correo asociado a su cuenta.`,
                    icon: 'success',
                    timer: 6000,
                    showConfirmButton: true,
                    confirmButtonText: 'Ok'
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.href = "/representante/artistas/mis-solicitudes";
                        location.href = location.href;
                    }
                });
            }
        });
    });

    $("#confirmarNombre").on('click', function() {
        if ($('#nombreArtista').val()) {
            Swal.fire({
                title: 'Importante',
                text: `Asegurate de que el nombre esta bien escrito, no podrás
            volver a modificarlo más adelante.`,
                icon: 'info',
                showCancelButton: true,
                confirmButtonText: 'Continuar',
                cancelButtonText: 'Volver',
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit("nombreConfirmado");
                    $("#nombreArtista").attr("disabled", "disabled");
                }
            });
        } else {
            Swal.fire({
                title: 'Error',
                text: `Por favor indicanos el nombre del artista.`,
                icon: 'error',
                timer: 3500,
            });
        }
    });

    function formularios() {
        return {
            abrir() {
                this.show = true;
            },
            cerrar() {
                this.show = false;
            },
            estaAbierto() {
                return this.show === true;
            },
        }
    }

    function initializeSwiper() {
        let swiper = new Swiper(".swiperGenerosArtista", {
            slidesPerView: 2,
            breakpoints: {
                1024: {
                    slidesPerView: 5,
                }
            }
        });
    }

    window.addEventListener('onContentChanged', (event) => {
        initializeSwiper();
    });

    window.onload = function() {
        initializeSwiper();
    }
</script>
