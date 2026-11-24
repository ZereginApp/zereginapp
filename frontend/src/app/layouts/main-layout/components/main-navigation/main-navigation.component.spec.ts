import { ComponentFixture, TestBed } from '@angular/core/testing';
import { provideRouter, RouterModule } from '@angular/router';

import { MainNavigation } from './main-navigation.component';

describe('MainNavigation', () => {
  let component: MainNavigation;
  let fixture: ComponentFixture<MainNavigation>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [RouterModule],
      declarations: [MainNavigation],
      providers: [provideRouter([])]
    })
    .compileComponents();

    fixture = TestBed.createComponent(MainNavigation);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
